<?php
require('top.inc.php');

if(isset($_GET['type']) && $_GET['type']!=''){
  $type=safe_chesey($con,$_GET['type']);
  $uid=safe_chesey($con,$_GET['id']);
  if($type=='status'){
  if($_GET['operation']=='enable'){
mysqli_query($con,"UPDATE `students` set status='1' where id='$uid'");
  }else{
    mysqli_query($con,"UPDATE `students` set status='0' where id='$uid'");
  }
}
if($type=='delete'){
mysqli_query($con,"delete from `students` where `students`.`id`='$uid'");
}
}

?>
<div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Tables</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Tables</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Tables</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="#" class="btn btn-sm btn-neutral">New</a>
              <a href="#" class="btn btn-sm btn-neutral">Filters</a>
            </div>
          </div>
          <p><a style="color:#ffffff;" href="manage_students.php">Add Students here </a></p>
        </div>
      </div>
    </div>
    <div class="container-fluid mt--6">
<div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Light table</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">id</th>
                    <th scope="col" class="sort" data-sort="budget">name</th>
                    <th scope="col" class="sort" data-sort="status">roll</th>
                    <th scope="col">class</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody class="list">
                <?php
$res=mysqli_query($con,"SELECT `students`.`id`,`students`.`class`,`students`.`name`,`students`.`roll`,`students`.`status`  FROM `students`,`classes` where `classes`.`id`=`students`.`class`");
while($row=mysqli_fetch_assoc($res)){
                ?>
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        
                        <div class="media-body">
                          <span class="name mb-0 text-sm"><?php echo $row['id'] ?></span>
                        </div>
                      </div>
                    </th>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-warning"></i>
                        <span class="status"><?php echo $row['name'] ?></span>
                      </span>
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-warning"></i>
                        <span class="status"><?php echo $row['roll'] ?></span>
                      </span>
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="completion mr-2"><?php echo $row['class'] ?></span>
                        <div>
                          
                        </div>
                      </div>
                    </td>
                    <td class="text-right">
                    <p><?php
                    if($row['status']==1){
                    echo "Active";
                    }else{
                      echo "disabled";
                    }
                    ?></p>
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="?type=status&operation=enable&id=<?php echo $row['id'] ?>">enable</a>
                          <a class="dropdown-item" href="?type=status&operation=disable&id=<?php echo $row['id'] ?>">disable</a>
                          <a class="dropdown-item" href="manage_students.php?id=<?php echo $row['id'] ?>">edit</a>
                          <a class="dropdown-item" href="?type=delete&id=<?php echo $row['id'] ?>">delete</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <?php }
                  ?>
                 
                 
                </tbody>
              </table>
            </div>
            <!-- Card footer -->
            <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                      <i class="fas fa-angle-left"></i>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">
                      <i class="fas fa-angle-right"></i>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
</div>
<?php
require('footer.inc.php');

?>