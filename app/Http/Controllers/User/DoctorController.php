<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Specialty;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class DoctorController extends Controller
{
    /**
     * Show the form for creating the specified resource.
     */
    public function create()
    {
        $user = Auth::user();
        $specialties = Specialty::all();

        return view('user.cruds.create', compact('user', 'specialties'));
    }

    /**
     * Store the specified resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        // Validate request data
        $data = $request->validate(
            [
                'doctor_tag' => 'required',
                'birth_date' => 'required',
                'phone_number' => 'required|numeric|unique:user_details|gt:0|digits:10',
                'phone_number.digits' => 'Il numero di telefono deve essere composto da dieci numeri',
                'work_address' => 'required|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
                'personal_address' => 'required|regex:/(^[-0-9A-Za-z.,\/ ]+$)/|different:work_address',
                'performance' => 'required|string|max:255|min:5',
                'profile_picture' => 'required|',
                'cv_file' => 'required|mimes:pdf|max:3000',
                'specialties' => ['required', 'array', 'min:1'],
                'specialties.*' => ['exists:specialties,id'],
            ],
            [
                'doctor_tag.required' => 'Seleziona un iniziativo!',
                'birth_date.required' => 'E\' richiesta la data di nascita',
                'phone_number.required' => 'Inserisci un numero di telefono',
                'phone_number.digits' => 'Il numero di telefono deve essere composto da dieci numeri',
                'work_address.required' => 'Inserisci l\'indirizzo di lavoro',
                'personal_address.required' => 'Inserisci l\'indirizzo di residenza',
                'personal_address.different' => 'L\'indirizzo di residenza deve essere diverso da quello del luogo di lavoro',
                'performance.required' => 'Il campo : tipo di visita deve essere compilato',
                'performance.min' => 'Il campo : tipo di visita deve contenere 5 o più lettere',
                'profile_picture.required' => 'Inserisci un\'imagine di profilo',
                'cv_file.required' => 'Carica il tuo Curriculum',
                'cv_file.mimes' => 'Inserisci un file di tipo pdf',
                'cv_file.max' => 'Il file deve essere di dimensione max: 3kb',
                'specialties' => 'Scegli una o più specialità',
            ]
        );

        // Append the logged user id to column 'user_id'
        $data['user_id'] = $user->id;

        $profileImgPath = Storage::put('uploads/profile_pictures', $request['profile_picture']);
        $data['profile_picture'] = $profileImgPath;

        $cvPath = Storage::put('uploads/cvs', $request['cv_file']);
        $data['cv_file'] = $cvPath;

        // Generate slug using the logged-in user's name and id
        $slug = Str::of("$user->id $user->name")->slug('-');
        // Update the user with the new slug (and other fields if needed)
        $user->update(['slug' => $slug]);

        $userDetail = UserDetail::create($data);

        // Attach the selected specialties to the user
        if (isset($data['specialties'])) {
            $user->specialties()->attach($data['specialties']);
        }

        return redirect()->route('user.dashboard')->with('success', 'Profilo creato con successo!');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $user = Auth::user();
        $specialties = Specialty::all();

        // Logic for editing user

        return view('user.cruds.edit', compact('user', 'specialties'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        $userDetail = $user->userDetail;

        // Validate request data
        $data = $request->validate(
            [
                'doctor_tag' => 'required',
                'birth_date' => 'required',
                'phone_number' => 'required|numeric|gt:0|digits:10', Rule::unique('user_details')->ignore($user->id),
                'work_address' => 'required|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
                'personal_address' => 'required|regex:/(^[-0-9A-Za-z.,\/ ]+$)/|different:work_address',
                'performance' => 'required|string|max:255|min:5',
                'profile_picture' => 'sometimes|image|mimes:jpeg,png,jpg|max:2048',
                'cv_file' => 'sometimes|mimes:pdf|max:5048',
                'specialties' => ['required', 'array', 'min:1'],
                'specialties.*' => ['exists:specialties,id'],
            ],
            [
                'doctor_tag.required' => 'Seleziona un iniziativo!',
                'birth_date.required' => 'E\' richiesta la data di nascita',
                'phone_number.required' => 'Inserisci un numero di telefono',
                'phone_number.digits' => 'Il numero di telefono deve essere composto da dieci numeri',
                'work_address.required' => 'Inserisci l\'indirizzo di lavoro',
                'personal_address.required' => 'Inserisci l\'indirizzo di residenza',
                'personal_address.different' => 'L\'indirizzo di residenza deve essere diverso da quello del luogo di lavoro',
                'performance.required' => 'Il campo : tipo di vista deve essere compilato',
                'performance.min' => 'Il campo : tipo di vista deve contenere 5 o più lettere',
                'profile_picture.image' => 'L\'immagine del profilo deve essere un\'immagine.',
                'profile_picture.mimes' => 'L\'immagine del profilo deve essere di tipo: jpeg, png, jpg.',
                'profile_picture.max' => 'L\'immagine del profilo non deve superare i 2MB.',
                'cv_file.mimes' => 'Inserisci un file di tipo pdf',
                'cv_file.max' => 'Il file deve essere di dimensione max: 3kb',
                'specialties' => 'Scegli una o più specialità',
            ]

        );
        // Append the logged user id to column 'user_id'
        $data['user_id'] = $user->id;
        $data['profile_picture'] = $this->handleFileUpload(
            $request,
            'profile_picture',
            'uploads/profile_pictures',
            $user->userDetail->profile_picture
        );
        $data['cv_file'] = $this->handleFileUpload(
            $request,
            'cv_file',
            'uploads/cvs',
            $user->userDetail->cv_file
        );

        $userDetail->update($data);

        $user->specialties()->sync($data['specialties']);

        return redirect()->route('user.dashboard')->with('success', 'Profilo editato con successo!');
    }

    private function handleFileUpload($request, $fileKey, $path, $fallbackValue)
    {
        if ($request->hasFile($fileKey)) {
            return Storage::put($path, $request[$fileKey]);
        }

        return $fallbackValue;
    }
}
