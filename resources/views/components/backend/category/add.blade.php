<x-layouts.login>

    <form method="POST" action="<?php echo route('category.add') ?>">
        <input type="text" name="category_name" placeholder="Thêm danh mục">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <button type="submit">Submit</button>
    </form>

</x-layouts.login>
