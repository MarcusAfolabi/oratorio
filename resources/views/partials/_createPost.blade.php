<div id="create-post-modal" class="create-post is-story" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical rounded-lg p-0 lg:w-5/12 relative shadow-2xl uk-animation-slide-bottom-small">
        <div class="text-center py-3 border-b">
            <h3 class="text-lg font-semibold"> Share Post </h3>
            <button class="uk-modal-close-default bg-gray-100 rounded-full p-2.5 right-2" type="button" uk-close uk-tooltip="title: Close ; pos: bottom ;offset:7"></button>
        </div>
        <form id="post-form" action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-1 items-start space-x-4 p-5">
                <img src="{{ asset(auth()->user()->profile_photo_url) }}" class="bg-gray-200 border border-white rounded-full w-11 h-11">
                <div class="flex-1 pt-2">
                    <textarea name="content" class="uk-textare text-black shadow-none focus:shadow-none text-xl font-medium resize-none" rows="5" placeholder="Share your thought, {{ auth()->user()->name }}!"></textarea>
                </div>
            </div>
            <div uk-form-custom class="w-full py-3">
                <div class="bg-green-100 border-2 border-dashed flex flex-col h-32 items-center justify-center relative w-full rounded-lg dark:bg-green-800 dark:border-green-600">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-12">
                        <path d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                        <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                    </svg>
                </div>
                <input type="file" name="image[]" accept="file/*" multiple>
            </div>
            <div class="flex items-center w-full justify-between border-t p-3">
                <select name="category_id" class="selectpicker mt-2 story">
                    @if(auth()->user()->role === 'admin') 
                    <option value="Jobs"> Jobs</option> 
                    <option value="Event"> Event</option> 
                    <option value="Scholarship"> Scholarship</option> 
                    <option value="BeSpoke"> BeSpoke</option> 
                    <option value="Podcast"> Podcast</option> 
                    <option value="Sermon"> Sermon</option> 
                    <option value="SingleTrack"> SingleTrack</option> 
                    <option value="Gallery"> Gallery</option> 
                    @else
                    <option value="thought" selected>Thought</option>
                    @endif
                </select>

                <div class="flex space-x-2">
                    <button id="submit-btn" type="submit" form="post-form" class="bg-red-100 flex font-medium h-9 items-center justify-center px-5 rounded-md text-red-600 text-sm">
                        Share </button>
                </div>
            </div>
        </form>
    </div>
</div>