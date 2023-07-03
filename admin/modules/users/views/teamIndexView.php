<?php
get_header();
?>
<div id="main-content-wp" class="list-post-page">
    <div class="wrap clearfix">
        <div class="section" id="title-page">
            <div class="clearfix">
                <h3 id="index" class="fl-left">Nhom quan tri vien</h3>
                <a href="?page=add_cat" title="" id="add-new" class="fl-left">Thêm mới</a>
            </div>
        </div>
        <?php get_sidebar('groupadmin'); ?>
        <div id="content" class="fl-right">
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="">Tat ca <span class="count">(10)</span></a> |</li>
                            <li class="publish"><a href="">Da dang <span class="count">(5)</span></a> |</li>
                            <li class="pending"><a href="">Cho xet duyet <span class="count">(5)</span></a></li>
                            <li class="trash"><a href="">Thung rac <span class="count">(0)</span></a></li>
                        </ul>
                        <form method="GET" class="form-s fl-right">
                            <input type="text" name="s" id="s">
                            <input type="submit" name="sm_s" value="Tim kiem">
                        </form>
                    </div>
                    <div class="actions">
                        <form method="GET" action="" class="form-actions">
                            <select name="actions">
                                <option value="0">Tac vu</option>
                                <option value="1">Chinh sua</option>
                                <option value="2">Bo vao thung rac</option>
                            </select>
                            <input type="submit" name="sm_action" value="Ap dung">
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Tieu de</span></td>
                                    <td><span class="thead-text">Danh muc</span></td>
                                    <td><span class="thead-text">Trang thai</span></td>
                                    <td><span class="thead-text">Nguoi tao</span></td>
                                    <td><span class="thead-text">Thoi gian</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                    <td><span class="tbody-text">1</h3></span>
                                    <td class="clearfix">
                                        <div class="tb-title fl-left">
                                            <a href="" title="">Bacon ipsum dolor amet hamburger frankfurter cow biltong pork loin capicola</a>
                                        </div>
                                        <ul class="list-operation fl-right">
                                            <li><a href="" title="Sua" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                            <li><a href="" title="Xoa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </td>
                                    <td><span class="tbody-text">Danh muc 1</span></td>
                                    <td><span class="tbody-text">Hoat dong</span></td>
                                    <td><span class="tbody-text">Admin</span></td>
                                    <td><span class="tbody-text">12-07-2016</span></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                    <td><span class="tbody-text">2</h3></span>
                                    <td class="clearfix">
                                        <div class="tb-title fl-left">
                                            <a href="" title="">Bacon ipsum dolor amet hamburger frankfurter cow biltong pork loin capicola</a>
                                        </div>
                                        <ul class="list-operation fl-right">
                                            <li><a href="" title="Sua" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                            <li><a href="" title="Xoa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </td>
                                    <td><span class="tbody-text">Danh muc 2</span></td>
                                    <td><span class="tbody-text">Hoat dong</span></td>
                                    <td><span class="tbody-text">Admin</span></td>
                                    <td><span class="tbody-text">12-07-2016</span></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                    <td><span class="tbody-text">3</h3></span>
                                    <td class="clearfix">
                                        <div class="tb-title fl-left">
                                            <a href="" title="">Bacon ipsum dolor amet hamburger frankfurter cow biltong pork loin capicola</a>
                                        </div>
                                        <ul class="list-operation fl-right">
                                            <li><a href="" title="Sua" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                            <li><a href="" title="Xoa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </td>
                                    <td><span class="tbody-text">Danh muc 3</span></td>
                                    <td><span class="tbody-text">Hoat dong</span></td>
                                    <td><span class="tbody-text">Admin</span></td>
                                    <td><span class="tbody-text">12-07-2016</span></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                    <td><span class="tbody-text">4</h3></span>
                                    <td class="clearfix">
                                        <div class="tb-title fl-left">
                                            <a href="" title="">Bacon ipsum dolor amet hamburger frankfurter cow biltong pork loin capicola</a>
                                        </div>
                                        <ul class="list-operation fl-right">
                                            <li><a href="" title="Sua" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                            <li><a href="" title="Xoa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </td>
                                    <td><span class="tbody-text">Danh muc 4</span></td>
                                    <td><span class="tbody-text">Hoat dong</span></td>
                                    <td><span class="tbody-text">Admin</span></td>
                                    <td><span class="tbody-text">12-07-2016</span></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                    <td><span class="tbody-text">5</h3></span>
                                    <td class="clearfix">
                                        <div class="tb-title fl-left">
                                            <a href="" title="">Bacon ipsum dolor amet hamburger frankfurter cow biltong pork loin capicola</a>
                                        </div>
                                        <ul class="list-operation fl-right">
                                            <li><a href="" title="Sua" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                            <li><a href="" title="Xoa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </td>
                                    <td><span class="tbody-text">Danh muc 5</span></td>
                                    <td><span class="tbody-text">Hoat dong</span></td>
                                    <td><span class="tbody-text">Admin</span></td>
                                    <td><span class="tbody-text">12-07-2016</span></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="tfoot-text">STT</span></td>
                                    <td><span class="tfoot-text">Tieu de</span></td>
                                    <td><span class="tfoot-text">Danh muc</span></td>
                                    <td><span class="tfoot-text">Trang thai</span></td>
                                    <td><span class="tfoot-text">Nguoi tao</span></td>
                                    <td><span class="tfoot-text">Thoi gian</span></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <ul id="list-paging" class="fl-right">
                        <li>
                            <a href="" title=""><</a>
                        </li>
                        <li>
                            <a href="" title="">1</a>
                        </li>
                        <li>
                            <a href="" title="">2</a>
                        </li>
                        <li>
                            <a href="" title="">3</a>
                        </li>
                        <li>
                            <a href="" title="">></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>