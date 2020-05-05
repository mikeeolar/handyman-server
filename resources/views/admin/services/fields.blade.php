<div class="row">
    <div class="col-md-12">
        <div class="card-body">
            <div class="form-group">
                <label for="gender">Select Category</label>
                <select name="gender" class="form-control" style="width: 100%;">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name"
                       placeholder="Service Name">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" placeholder="Service description"></textarea>
            </div>
            <div class="form-group float-sm-right" style="margin-top: 10px;">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>
