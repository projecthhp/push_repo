<form action="/search-blog" method="GET" id="search_blog">
	<input type="text" id="keyword" value="<?= (isset($keyword))?$keyword:''?>" name="keyword" placeholder="Search bài viết, nội dung cần tìm kiếm">
	<button type="submit" id="btn_search">Tìm kiếm</button>
</form>
</div>
</div>