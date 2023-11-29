<div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image" style="border-radius:30px;"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" method='post'>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="tenDangNhap">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                placeholder="Password"  name="matKhau">
                                        </div>
                                        <div class="form-group">
                                           
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block" type='submit' name="dangNhap">
                                            Login
                                        </button>
                                        <hr>
                                    </form>
                                    <hr>

                                </div>
                            </div>
                        </div>



<?php
                if (isset($_POST["dangNhap"])) {

                    $username = $_POST["tenDangNhap"];
                    $password = $_POST["matKhau"];

                    $username = strip_tags($username);
                    $username = addslashes($username);
                    $password = strip_tags($password);
                    $password = addslashes($password);
                                $sql = "SELECT * FROM login WHERE tk = '$username' and mk = '$password' ";
                                $query = mysqli_query($con,$sql);
                                $num_rows = mysqli_num_rows($query);
                                $data = mysqli_fetch_assoc($query);
                            
                    if ($num_rows==1) {
                        $_SESSION['user'] =$data;
                                $user = [];
                                $user = (isset($_SESSION['user'])) ? $_SESSION['user']: [];

                                $_SESSION['data_account'] = md5($user['mk'])."".md5($user['tk']);
								echo "<script>window.location='admin.php'</script>";
                                


                            }   
                else if ($username == "" || $password =="")
                {
                    
                    echo "Chưa nhập tên tài khoản và mật khẩu";
                }
                else 
                {
                    echo "Tài khoản hoặc mật khẩu không đúng";
                }

                }

?>

