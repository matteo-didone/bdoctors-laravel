document.getElementById('cv_file').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file && file.type === "application/pdf") {
        const objectElem = document.getElementById('pdf-preview');
        objectElem.data = URL.createObjectURL(file);
        document.getElementById('pdf-preview-container').classList.remove('hidden');
    } else {
        document.getElementById('pdf-preview-container').classList.add('hidden');
    }
});
