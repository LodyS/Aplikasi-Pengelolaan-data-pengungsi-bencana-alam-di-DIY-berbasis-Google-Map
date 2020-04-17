<link href="font-awesome.css" rel="stylesheet"> 
<div class="page-header">
    <h1>Login</h1>
</div>
<div class="row">
    <div class="col-md-4">        
        <?php if($_POST) include 'aksi.php';?>
        <form class="form-signin" action="?m=login" method="post">              
            <div class="form-group">
                <label><i class="fa fa-map-marker">Username</label></i>
                <input type="text" class="form-control" placeholder="Username" name="username" autofocus />
            </div>
            <div class="form-group">            
                <label>Password</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" />  
            </div>      
            <button class="btn btn-success" type="submit"></span> Masuk</button>        
        </form>      
    </div>
</div>


