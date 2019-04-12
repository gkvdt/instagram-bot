<?php include_once 'modal/components/header.php';?>

<div class="content">
                            <div class="module message">
                                <div class="module-head">
                                    <h3>
                                        Hesaplar</h3>
                                </div>
                                <div style="height:20px;"></div>
                               
                                <div class="module-body table">
                                    <table class="table table-message">
                                        <tbody>
                                            <tr class="heading">
                                             
                                              
                                                <td class="cell-icon  align-center ">
                                                    Kullanıcı Adı
                                                </td>
                                                <td class="cell-icon  align-center">
                                                    Şifre
                                                </td>
                                                <td class="cell-icon  align-center ">
                                                    Takip Sayısı
                                                </td>
                                                <td class="cell-icon  align-center">
                                                    Takipçi Sayısı
                                                </td>
                                            </tr>
<?php 
include_once 'modal/database/Database.php';
$database = new Database();

$users = $database->getAccounds();
foreach($users as $user){
?>
<tr class="unread" onclick="location.href='controller/Sessions.php?typ=login&id=<?php echo $user[0]; ?>'" >
                                             
                                              
                                                <td class="cell-icon align-center">
                                                    <?php echo $user[1]; ?>
                                                </td>
                                                <td class="cell-icon  align-center">
                                                    <?php echo $user[2]; ?>
                                                </td>
                                                <td class="cell-icon  align-center">
                                                    <?php echo $user[3]; ?>
                                                </td>
                                                <td class="cell-icon  align-center">
                                                    <?php echo $user[4]; ?>
                                                </td>
                                            </tr>
                                        
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="module-foot">
                                </div>
                            </div>
                            <div class="module">
                                <div class="module-head">
                                    <h3>Hesap Ekle</h3>
                                </div>
                                <div class="module-body">
                                        <form action="" id="add-accound" method="">
                                            <div class="form-group">
                                                <label for="">Kullanıcı Adı</label>
                                                <input type="text" name="username" id="username" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Şifre</label>
                                                <input type="text" name="password" id="password" class="form-control">
                                            </div>
                                            <input type="submit" class="btn btn-info " value="Ekle">
                                        </form>
                                  
                                </div>
                            </div>
                        </div>


<?php require_once 'modal/components/footer.php';?>
