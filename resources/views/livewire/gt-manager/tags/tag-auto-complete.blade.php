<div class="form-group row pt-0">
    <div class="col">
        <label><i class="bi bi-tags"></i> Tags input</label>
        <div>
            <input wire:model="tags" id="tags" class="form-control" placeholder="Type to search tags...">

            <div id="tags_tagsinput" class="tagsinput" style="width: 100%; min-height: 75%; height: 75%;">
                @foreach ($tags as $tag)
                    <span class="tag"><span>{{ $tag }}&nbsp;&nbsp;</span><a href="#" title="Removing tag">x</a></span>
                @endforeach
                <div id="tags_addTag">
                    <input id="tags_tag" value="" data-default="Add More" style="color: rgb(102, 102, 102); width: 68.2222px;" class="">
                </div>
                <div class="tags_clear"></div>
            </div>
        </div>
    </div>
</div>
