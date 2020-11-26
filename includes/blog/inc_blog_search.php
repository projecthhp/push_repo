<form action="/search-blog" method="GET">
  <input type="text" value="<?=isset($keyword)?$keyword:""?>" name="keyword" placeholder="Nhập từ khóa tìm kiếm...">
  <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
</form>