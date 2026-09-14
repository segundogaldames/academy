<div>
    <h1 class="font-bold text-3xl mt-6 mb-4">Reseñas</h1>
    <div class="bg-white shadow-lg rounded overflow-hidden mb-6">
        <div class="px-6 py-4">
            <h1 class="font-bold text-3xl text-gray-800">Reseñas del curso: {{ $course->reviews->count() }} </h1>
            @can('enrolled', $course)
                <article class="mb-4 text-gray-800">
                    @can('valued', $course)
                        <textarea rows="4" placeholder="Escribe tu reseña del curso" id="comment" wire:model.defer="comment"
                            class="w-full text-stone-800 placeholder:text-stone-600/60 border border-stone-200 transition-all ease-in text-sm py-2 px-2.5 shadow-sm bg-white rounded-lg focus:border-stone-400 focus:outline-none"
                            style="resize: none"></textarea>
                        <div class="flex justify-end mt-2">
                            <button wire:click="store"
                                class="inline-flex items-center justify-center border align-middle select-none font-sans font-medium text-center duration-300 ease-in disabled:opacity-50 disabled:shadow-none disabled:cursor-not-allowed focus:shadow-none text-sm py-2 px-4 shadow-sm hover:shadow-md bg-blue-500 hover:bg-info-light relative bg-gradient-to-b from-blue-500 to-blue-600 border-blue-600 text-stone-50 rounded-lg hover:bg-gradient-to-b hover:from-blue-600 hover:to-blue-600 hover:border-blue-600 after:absolute after:inset-0 after:rounded-[inherit] after:box-shadow after:shadow-[inset_0_1px_0px_rgba(255,255,255,0.35),inset_0_-2px_0px_rgba(0,0,0,0.18)] after:pointer-events-none transition antialiased">Guardar</button>
                            <ul class="flex items-center ml-4">
                                <li class="mr-1 cursor-pointer" wire:click="set('rating', 1)"><i
                                        class="fas fa-star {{ $rating >= 1 ? 'text-yellow-300' : 'text-gray-400' }}"></i>
                                </li>
                                <li class="mr-1 cursor-pointer" wire:click="set('rating', 2)"><i
                                        class="fas fa-star {{ $rating >= 2 ? 'text-yellow-300' : 'text-gray-400' }}"></i>
                                </li>
                                <li class="mr-1 cursor-pointer" wire:click="set('rating', 3)"><i
                                        class="fas fa-star {{ $rating >= 3 ? 'text-yellow-300' : 'text-gray-400' }}"></i>
                                </li>
                                <li class="mr-1 cursor-pointer" wire:click="set('rating', 4)"><i
                                        class="fas fa-star {{ $rating >= 4 ? 'text-yellow-300' : 'text-gray-400' }}"></i>
                                </li>
                                <li class="mr-1 cursor-pointer" wire:click="set('rating', 5)"><i
                                        class="fas fa-star {{ $rating == 5 ? 'text-yellow-300' : 'text-gray-400' }}"></i>
                                </li>
                            </ul>
                        </div>
                    @else
                        <div role="alert"
                            class="relative flex items-start w-full border rounded-md p-2 bg-green-500 border-green-500 text-green-50">
                            <div class="w-full text-sm font-sans leading-none m-1.5">Este curso ya ha sido evaluado por usted.
                                Muchas gracias por su feedback.</div>
                        </div>
                    @endcan
                </article>
            @endcan

            @foreach ($course->reviews as $review)
                <article class="flex items-center mb-4 text-gray-800">
                    <figure class="mr-4">
                        <img class="h-12 w-12 object-cover rounded-full mr-4 shadow-lg"
                            src="{{ $review->user->profile_photo_url }}" alt="">
                    </figure>
                    <div class="bg-white shadow-lg rounded overflow-hidden bg-gray-100 w-full">
                        <div class="px-6 py-4">
                            <p class="text-gray-500 text-sm"> {{ $review->user->name }} <i
                                    class="fas fa-star text-yellow-300"></i> {{ $review->rating }} </p>
                            <p> {{ $review->comment }} </p>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</div>
