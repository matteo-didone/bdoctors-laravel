<x-app-layout>

    <div class="flex flex-row flex-wrap sm:relative gap-5 sm:gap-0">

        <a class="bd_dashboard-stat-2 w-full sm:w-2/4 h-60 rounded-xl sm:rounded-ss-xl sm:rounded-none shadow-xl overflow-hidden  hover:scale-105 hover:duration-300 hover:rounded-xl hover:grayscale hover:z-10 active:scale-95 active:duration-150 " href="{{ route('user.messages')}}" >
            <div class="flex justify-center gap-3 2xl:gap-10 items-center py-10 px-6 h-full">
                <div class="text-white">
                    <p class="text-3xl md:text-4xl xl:text-2xl">Conta Messaggi</p>
                    <h2 class="text-5xl md:text-7xl lg:text-8xl xl:text-3xl 2k:text-7xl font-bold">{{ $totalMessagesCount }}</h2>
                </div>
                <div class="h-auto w-28 md:w-40 lg:w-48 xl:w-28 2k:w-40">
                    <img src="{{ asset('storage/images/message-icon-dashboard.png') }}" alt="messages icon"
                        class="w-full h-full invert">
                </div>
            </div>
        </a>

        <a class="bd_dashboard-stat-3 w-full sm:w-2/4 h-60 rounded-xl shadow-xl sm:rounded-se-xl sm:rounded-none overflow-hidden  hover:scale-105 hover:duration-300 hover:rounded-xl hover:grayscale hover:z-10 active:scale-95 active:duration-150 " href="{{ route('user.reviews')}}">
            <div class="flex justify-center gap-3 2xl:gap-10 items-center py-10 px-6 h-full ">
                <div class="text-white">
                    <p class="text-3xl md:text-4xl xl:text-2xl">Conta Recensioni</p>
                    <h2 class="text-5xl md:text-7xl lg:text-8xl xl:text-3xl 2k:text-7xl font-bold">{{ $totalReviewsCount }}</h2>
                </div>
                <div class="h-auto w-28 md:w-40 lg:w-48 xl:w-28 2k:w-40">
                    <img src="{{ asset('storage/images/reviews-icon-dashboard.png') }}" alt="reviews icon"
                        class="w-full h-full invert">
                </div>
            </div>
        </a>

        <a class="bd_dashboard-stat-1 w-full sm:w-2/4 h-60 rounded-xl sm:rounded-bl-xl sm:rounded-none shadow-xl overflow-hidden hover:scale-105 hover:duration-300 hover:rounded-xl hover:grayscale hover:z-10 active:scale-95 active:duration-150" href="{{ route('user.reviews')}}">
            <div class="flex justify-center gap-3 2xl:gap-10 items-center py-10 px-6 h-full ">
                <div class="text-white">
                    <p class="text-3xl md:text-4xl xl:text-2xl">Media Voti</p>
                    <h2 class="text-5xl md:text-7xl lg:text-8xl xl:text-3xl 2k:text-7xl font-bold">{{ number_format($averageVote, 2) }}</h2>
                </div>
                <div class="h-auto w-28 md:w-40 lg:w-48 xl:w-28 2k:w-40">
                    <img src="{{ asset('storage/images/votes-icon-dashboard.png') }}" alt="messages icon"
                        class="w-full h-full invert">
                </div>
            </div>
        </a>
        
        <a id="toggleButton" class=" bd_dashboard-stat-4 w-full h-60 shadow-xl overflow-hidden rounded-xl sm:rounded-br-xl duration-300 sm:rounded-none p-1 bg-black hover:cursor-pointer hover:rounded-xl hover:duration-300 sm:absolute sm:bottom-0 sm:right-0">
            <canvas id="myChart"  ></canvas>
        </a>

        
    </div>

    

</x-app-layout>

 @php
     
     $data = '';

     foreach ($reviews as $review) {
        $data.= $review->vote->vote;
     };

    
 @endphp

        <script>
            const labels = [
                '1',
                '2',
                '3',
                '4',
                '5',
                '6',
                '7',
                '8',
                '9',
                '10',
            ];

            const data = {
                labels: labels,
                datasets: [{
                    label: 'Andamento voti dal piu recente',
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: <?php echo json_encode($data); ?>
                }]
            };

            const config = {
                type: 'line',
                data: data,
                options: {
                    scales:{
                        y:{
                            max: 5,
                            min: 0,
                            ticks: {
                                color: 'white' // Y-axis label font color
                            }
                        },

                        x:{
                            ticks: {
                                color: 'white' // Y-axis label font color
                            }
                        }
                    }
                    
                    
                }
            };

            new Chart(
            document.getElementById('myChart'),
            config
            );

            document.addEventListener("DOMContentLoaded", function() {
                const toggleButton = document.getElementById("toggleButton");
                let isExpanded = false;

                toggleButton.addEventListener("click", function() {
                    isExpanded = !isExpanded;

                    if (isExpanded) {
                    toggleButton.classList.add("event-stats");
                    
                    } else {
                    toggleButton.classList.remove("event-stats");
                    }
                });
                });

        </script>