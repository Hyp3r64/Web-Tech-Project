<?php
    require_once('../Models/user-info-model.php');    
    require_once('../Controllers/message-controller.php');
    if(!isset($_COOKIE['flag'])){
        popup("Error!","You need to sign-in in order to access this page.");
    }     
    $id=$_COOKIE['id'];
    $row = UserInfo($id);
?>  
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile Info</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<div class="first">
    <a href="../index.php"><img src="../Uploads/logo.png" alt="Logo"  width="120px" height="70px"></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="search.php"><button class="header-button">Search GameStop</button></a>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <img src="../<?php echo $row['profilepic']; ?>" width="40px">&nbsp;&nbsp;&nbsp;
                <select name="profile" onchange="location = this.value;">
                    <option disabled selected hidden><?php echo $row['username']; ?></option>
                    <option value="../index.php">Home Page</option>
                    <option value="user-profile.php">Profile</option>
                    <option value="dashboard.php">Dashboard</option>
                    <option value="sales-history.php">Sales History</option>
                    <option value="settings.php">Settings</option>
                    <option value="logout-page.php">Log Out</option>
                </select>
        
    </div>
    <div class="header"></div><br><br>     
    <center>
            <img src=<?php echo "../{$row['profilepic']}" ?> width="100px">
            
        <br><br><br>
        <form action=<?php echo "../Controllers/update-profile-info-controller.php?id={$id}"?> method="post">
        <table width="40%" border="0" cellspacing="0" cellpadding="15" bordercolor="#f55405">
            <tr>
                <td>
                    <font color="black" face="times new roman" size="6">Full Name :
                </td>
                <td>
                    <input type="text" name="Fullname" id="fullname" value="<?php echo"{$row['fullname']}" ?>" onkeyup="validateFullName()"></font>
                <br>
                <font color="red" face="times new roman" size="3" id="fnameError"></font>
                </td>

                    </td>
            </tr>
            <tr>
                <td>
                    <font color="black" face="times new roman" size="6">Username :
                </td>
                <td>
                    <input type="text" name="Username" id="username" value="<?php echo"{$row['username']}"?>" onkeyup="validateUsername()"></font>
                    <br>
                    <font color="red" face="times new roman" size="3" id="usernameError"></font>
                    </td>
            </tr>
            <tr>
                <td>
                    <font color="black" face="times new roman" size="6">Phone Number :
                </td>
                <td>
                    <input type="text" name="Phone" id="phone" value="<?php echo"{$row['phone']}"?>" onkeyup="validatePhoneNumber()"></font>
                    <br>
                    <font color="red" face="times new roman" size="3" id="phoneError"></font>
                    </td>
            </tr>
            <tr>
                <td>
                    <font color="black" face="times new roman" size="6">Email :
                </td>
                <td>
                    <input type="text" name="Email" id="email" value="<?php echo"{$row['email']}"?>" onkeyup="validateEmail()"></font>
                    <br>
                    <font color="red" face="times new roman" size="3" id="mailError"></font>
                    </td>
            </tr>
            <tr align="center">
                <td colspan="2">
                    <input class="btn-submit" type="submit" name="updateinfo" id="submitButton" value="Update Information">
                </td>
            </tr>
        </table>
        <br><br><br>
        </form>
    <div class="footer">
            <center>
                <a href="about-us.php">
                    <font color="white" face="times new roman" size="4">About Us</font>
                </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="helpline.php">
                    <font color="white" face="times new roman" size="4">Helpline</font>
                </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="faq.php">
                    <font color="white" face="times new roman" size="4">FAQ</font>
                </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="terms-and-services.php">
                    <font color="white" face="times new roman" size="4">Terms and Services</font>
                </a><br><br>
                <font color="white" face="times new roman" size="3">GameStop</font><br>
                <font color="white" face="times new roman" size="2">GameStop LTD Company</font><br>
                <font color="white" face="times new roman" size="1">© 2024 by GameStop.com, Inc.</font>
            </center>
    </div>
    <script>
    
    function validateFullName() {
        let fullNameInput = document.getElementById("fullname");
        let fullNameError = document.getElementById("fnameError");
        let fullName = fullNameInput.value;

        if (fullName.trim() === "") {
            fullNameError.textContent = "Full Name cannot be empty";
        } else if (fullName.split(" ").length < 2) {
            fullNameError.textContent = "Full Name must contain exactly 2 words";
        } else if (fullName.length > 50) {
            fullNameError.textContent = "Full Name should be less than 50 characters";
        } else {
            fullNameError.textContent = "";
        }
        checkFormValidity()
    }

    
    function validateUsername() {
        let usernameInput = document.getElementById("username");
        let usernameError = document.getElementById("usernameError");
        let username = usernameInput.value;

        if (username.trim() === "") {
            usernameError.textContent = "Username cannot be empty";
        } else if (username.split(" ").length > 1) {
            usernameError.textContent = "Username cannot contain spaces";
        } else if (username.length > 40) {
            usernameError.textContent = "Username should be less than 40 characters";
        } else {
            usernameError.textContent = "";
        }
        checkFormValidity()
    }

    
    function validatePhoneNumber() {
        let phone = document.getElementById('phone').value;

            if (phone === '') {
                document.getElementById('phoneError').innerHTML = "Phone number cannot be empty.";
            } else {
                for (let i = 0; i < phone.length; i++) {
                    if (!Number.isInteger(parseInt(phone[i]))) {
                        document.getElementById('phoneError').innerHTML = "Phone number can only contain numbers.";
                        break;
                    }
                }

                if (phone.length !== 11) {
                    document.getElementById('phoneError').innerHTML = "Phone number must be 11 characters long.";
                } else {
                    document.getElementById('phoneError').innerHTML = "";
                }
            }
            checkFormValidity()
            
    }

    
    function validateEmail() {
        let mail = document.getElementById('email').value;
            let atPos = mail.indexOf('@');
            let dotPos = mail.lastIndexOf('.');

            if (!mail) {
                document.getElementById('mailError').innerHTML = "Email cannot be empty.";
            } else if (atPos === -1 || atPos === 0 || dotPos === -1 || dotPos <= atPos + 1 || dotPos === mail.length - 1) {
                document.getElementById('mailError').innerHTML = "Invalid email address.";
            } else {
                document.getElementById('mailError').innerHTML = "";
            }
            checkFormValidity()
    }

    
    function checkFormValidity() {
        let fullname = document.getElementById('fullname').value;
            let username = document.getElementById('username').value;
            let phone = document.getElementById('phone').value;
            let email = document.getElementById('email').value;
            
            

            if (
                fullname === '' ||
                username === '' ||
                phone === '' ||
                email === '' ||
                document.getElementById('fnameError').innerText !== '' ||
                document.getElementById('usernameError').innerText !== '' ||
                document.getElementById('phoneError').innerText !== '' ||
                document.getElementById('mailError').innerText !== ''
            ) {
                document.getElementById('submitButton').disabled = true;
            } else {
                document.getElementById('submitButton').disabled = false;
            }
    }

</script>
</body>
</html>

