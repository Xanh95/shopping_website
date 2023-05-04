<!--views/products/showproducts.php-->
<div class="products">
    <div class="container-fluid">
        <div class="row d-flex justify-content-between px-5">
            <div class="name-products">
                <h3>

                    <?php echo $category ?>
                </h3>
                <hr>
            </div>
        </div>
        <div class="container-card-products">
            <?php foreach ($post as $values) : ?>
            <div class="card-product-a">
                <div class="card-product-body-sale">
                    <div class="card-product-img justify-content-center">
                        <a href="home/khuyenmai/<?php echo $values['id'] ?>">
                            <img src="assets/img/post/<?php echo $values['avatar_sale'] ?>"
                                alt="assets/img/post/<?php echo $values['avatar_sale'] ?>"
                                class="img-fluid img-product">
                        </a>
                    </div>

                    <div class="news-title">
                        <h6><?php echo $values['title'] ?></h6>
                    </div>
                </div>
            </div>
            <?php endforeach ?>


        </div>
    </div>
    <hr class="products-hr">
    <div class="pagination">
        <input type="hidden" value="<?php echo $action ?>" id="<?php echo $action ?>">
        <?php if ($count_total > $limit) : ?>
        <a href="./home/<?php echo $action ?>/<?php echo ($page - 1) <= 0 ? 1 : ($page - 1)
                                                    ?>">&lt;&lt;</a>
        <?php if ($total_page > 10) : ?>
        <a href="./home/<?php echo $action ?>/1">1</a>
        <a href="./home/<?php echo $action ?>/2">2</a>
        <a href="./home/<?php echo $action ?>/3">3</a>
        <input type="text" style="width: 30px;" value="<?php echo $page ?>" id="go_page_<?php echo $action ?>"> <a
            href="./home/<?php echo $action ?>/" id="go_link_<?php echo $action ?>">Go</a>
        <a href="./home/<?php echo $action ?>/<?php echo $total_page - 2 ?>"><?php echo $total_page - 2 ?></a>
        <a href="./home/<?php echo $action ?>/<?php echo $total_page - 1 ?>"><?php echo $total_page - 1 ?></a>
        <a href="./home/<?php echo $action ?>/<?php echo $total_page ?>"><?php echo $total_page ?></a>
        <?php else : ?>
        <?php for ($i = 1; $i <= $total_page; ++$i) : ?>
        <a href="./home/<?php echo $action ?>/<?php echo $i; ?>"
            style="color: <?php echo ($page == $i) ? '#ff6000' : '#007bff' ?>;"><?php echo $i; ?></a>
        <?php endfor; ?>
        <?php endif ?>


        <a href="./home/<?php echo $action ?>/<?php echo ($page + 1) >= $total_page ? $total_page : ($page + 1)
                                                    ?>">&gt;&gt;</a>
        <?php endif
        ?>
    </div>
</div>