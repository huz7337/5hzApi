<div class="row">
    <div class="col-6">
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-3 mb-4">
            <div class="col">
                <a class="btn btn-light btn-icon-split w-100"
                   href="{{ route('categories.index') }}"
                >
                <span class="icon text-gray-600">
                    <i class="fa-solid fa-file-lines"></i>
                </span>
                    <span class="text">Categories</span>
                </a>
            </div>
            <div class="col">
                <a class="btn btn-light btn-icon-split w-100"
                   href="{{ route('comments.index') }}"
                >
                <span class="icon text-gray-600">
                  <i class="fa-solid fa-comment"></i>
                </span>
                    <span class="text">Comments</span>
                </a>
            </div>
            <div class="col">
                <a class="btn btn-light btn-icon-split w-100"
                   href="{{ route('tags.index') }}"
                >
                <span class="icon text-gray-600">
                  <i class="fa-solid fa-tag"></i>
                </span>
                    <span class="text">Tags</span>
                </a>
            </div>
        </div>
    </div>
</div>
