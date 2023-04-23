@props(['post'])
<div id="edit-post-modal" class="create-post is-story" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical rounded-lg p-0 lg:w-5/12 relative shadow-2xl uk-animation-slide-bottom-small">
        <div class="text-center py-3 border-b">
            <h3 class="text-lg font-semibold"> Edit Post </h3>
            <button class="uk-modal-close-default bg-gray-100 rounded-full p-2.5 right-2" type="button" uk-close uk-tooltip="title: Close ; pos: bottom ;offset:7"></button>
        </div>
        <form action="{{ route('post.update', $post) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-1 items-start space-x-4 p-5">
                <img src="{{ asset(auth()->user()->profile_photo_url) }}" class="bg-gray-200 border border-white rounded-full w-11 h-11">
                <div class="flex-1 pt-2">
                    <textarea name="content" class="uk-textare text-black shadow-none focus:shadow-none text-xl font-medium resize-none" rows="5" placeholder="Share your thought, {{ auth()->user()->name }}!"> {{ $post->content }}</textarea>
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
                <select type="hidden" name="category_id" class="selectpicker mt-2 story">
                    @if(auth()->user()->role === 'admin')
                    @php $medias = App\Models\Media::select('id', 'type')->latest()->get(); @endphp
                    @foreach($medias as $media)
                    <option value="{{ $media->id }}" selected>{{ $media->type }}</option>
                    @endforeach
                    @else
                    <option value="0" selected>Thought</option>
                    @endif
                </select>

                <div class="flex space-x-2">
                    <button type="submit" class="bg-red-100 flex font-medium h-9 items-center justify-center px-5 rounded-md text-red-600 text-sm">
                        <svg class="h-5 pr-1 rounded-full text-red-500 w-6 fill-current" id="veiw-more" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="false" style="">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                        </svg> Share </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
$(function() {
    $('[data-url]').on('click', function(e) {
        e.preventDefault();
        var url = $(this).data('url');
        $('#create-post-form').attr('action', url);
        UIkit.modal('#create-post-modal').show();
    });
});
</script>