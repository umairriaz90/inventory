<?php ob_start(); session_start();
	if (isset($_SESSION['UserName']))
	header("Location:../index.php");			
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<title>Admin:Login</title>
        <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
       
        <link href="../css/admin.css" rel="stylesheet" type="text/css" />
	</head>
<body>
	<div id="main" style="margin-top:100px;">
    	<table align="center">
    		<tr>
        	  <td>
			      <div id="middle" style="width:620px;!important">
  			          <div class="top-bar" style="width:500px; height:25px; margin-top:10px;">
   			              <h1>Administration Login</h1><br/>
  			      </div>
                  <div style="width:190px; height:190px; float:left;">
                    <p style="margin-left:20px;">Use a valid username and password to gain access to the Administrator Back-end
                	    <br/><br/>
                		<img src="../images/lock.png" width="132" height="117" />
                	</p>
                 </div>
                <div class="login"><br/>
				
         
                                              
                	<?php
if (isset($_SESSION['msg']))
   {
	 echo"   <table width='308'>
                                	<tr>
                                    	 	<td width='120'></td>
											 <td style='color:#c00808; font-weight:bold; font-size:13px'>". $_SESSION['msg']."</td>
                                    
                                    </tr>
                                
                                </table>      "; 
   }
     else
							   {
								   ?>


 
							 
								   <table width="308">
                                	<tr>
                                    	<td width="85"></td>
                                        <td style='color:#591a4f; font-weight:bold; font-size:13px'>Please Enter Valid Information</td>
                                    
                                    </tr>
                                
                                </table>
							   <?php }
							   
							   ?>

                    <form method="post" action="logincheck.php"  style="float:left">
                      <table style="margin-left:10px">
  						<tr>
 							 <td><h4>User Name:</h4></td>
                             <td><input type="text" name="txtUserID" value="" class="inp"/></td>
  						</tr>
         				<tr>
     					     <td><h4>Password:</h4></td>
                             <td><input type="password" name="txtPass" value="" class="inp"/></td>
          </tr>
    <tr>
    	<td></td>
        <td><input type="submit" value="Login" class="submit"/>
        	<input type="reset" value="Reset" class="submit" />
        </td>
    </tr>
  </table>
  </form></div></div></td>
  </tr>
  </table>
  </div>

<div id="footer"><p>Developed by <a href="#">paryer of my techers</a></p></div>
</body>
</html>



