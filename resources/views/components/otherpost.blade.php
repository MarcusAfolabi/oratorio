@props(['otherpost'])
<div id="otherPost" uk-modal>
    <div class="uk-modal-dialog">
        <button class="uk-modal-close-default m-3" type="button" uk-close></button>
        <div class="uk-modal-header">
            <h2 class="uk-modal-title"><i class="icon-material-outline-add"></i> Add new</h2>
        </div>
        <form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="p-3 space-y-7 mb-5">
                <div class="line">
                    <input class="line__input" maxlength="100" name="title" type="text" value="{{ old('title') }}" />
                    <span for="title" class="line__placeholder"> Title </span>
                </div>
            </div>

            <div class="p-3 space-y-7 mb-12">
                <div class="line">
                    <textarea class="line__input" row="2" maxlength="2000" name="content">{{ old('content') }} </textarea>
                    <span for="name" class="line__placeholder"> Content here </span>

                </div>
            </div>

            <div uk-form-custom class="w-full py-7 px-3 mt-5 mb-5">
                <div class="bg-blue-100 border-2 border-dashed flex flex-col h-32 items-center justify-center relative w-full rounded-lg dark:bg-blue-800 dark:border-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-12">
                        <path d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                        <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                    </svg>
                </div>
                <input type="file" name="image[]" multiple>
                <a href="#" class="bg-blue-200 flex font-medium h-9 items-center justify-center px-5 rounded-b-xl text-blue-600 text-white uk-position-bottom uk-transition-bottom-small">
                    Media File </a>
            </div>
            <div class="p-3 space-y-7">
                <div class="line">
                    <select name="category_id" class="selectpicker with-border">
                        @if(auth()->user()->role === 'admin')
                    @php $medias = App\Models\Media::select('id', 'type')->latest()->get(); @endphp
                        @foreach($medias as $media)
                        <option value="{{ $media->id }}" selected>{{ $media->type }}</option>
                        @endforeach
                        @else
                        <option value="0" selected>Thought</option>
                        @endif
                    </select>
                </div>
            </div>
            <div class="border-t flex justify-between lg:space-x-10 p-7 bg-green-50 rounded-b-md">
                <button class="button green" type="submit">Add</button>
            </div>
        </form>
    </div>
</div>