<?php 

require_once 'modal/components/header.php';?>
<?php //require_once 'components/footer.php';?>

<div class="content">
                            <div class="btn-controls">
                                <div class="btn-box-row row-fluid">
                                <a href="#" class="btn-box big span4"><i class=" icon-group"></i><b><?php 

if(!isset($_SESSION['followers'])){
    echo '-';
}else{
    echo $_SESSION['followers'];
}
?></b>
                                        <p class="text-muted">
                                            Takipçi Sayısı</p>
                                            </a><a href="#" id="followers" class="btn-box big span4"><i class="icon-user"></i><b><?php

if(!isset($_SESSION['following'])){
    echo '-';
}else{
    echo $_SESSION['following'];
}

?></b>
                                        <p class="text-muted">
                                            Takip</p>
                                    </a><a href="#" id="followpending" class="btn-box big span4"><i class="icon-random"></i><b>Takipçi Kas</b>
                                        <p class="text-muted">
                                        &nbsp</p>
                                    </a>
                                </div>
                                <div class="btn-box-row row-fluid">
                                    <a href="#" class="btn-box big span4"><i class=" icon-heart"></i><b>Beğeni Kas</b>
                                        <p class="text-muted">
                                        &nbsp</p>
                                    </a><a href="#" class="btn-box big span4"><i class="icon-bold"></i><b>Yorum Kas</b>
                                        <p class="text-muted">
                                        &nbsp</p>
                                    </a><a href="#" class="btn-box big span4"><i class="icon-signout"></i><b>Çıkış</b>
                                        <p class="text-muted">
                                        &nbsp</p>
                                    </a>
                                </div>

                            </div>
                            <!--/#btn-controls-->


                        </div>

<?php require_once 'modal/components/footer.php';?>
