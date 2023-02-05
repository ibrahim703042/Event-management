
<aside id="sidebar" class="sidebar">
   <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item"> <a class="nav-link " href="dashboard.php?page=widget"> <i class="bi bi-grid"></i> <span>Dashboard</span> </a></li>

      <li class="nav-heading">Pages</li>

      <!-- <li class="nav-item"> 
         <a class="nav-link collapsed" href="dashboard.php?page=pages/users/admin/index"> 
            <i class="bi bi-people"></i> <span>Administrateurs</span> 
         </a>
      </li> -->
      
      <?php
         if(isset($_SESSION['auth'])){

            if(isset($_SESSION['admin_ID'])){ 
                  
               $id = $_SESSION['admin_ID'];
               extract($admin->get_role_ByID('admins',$id))
                  ?>

                  <?php
                     if ($role_as == 1){
                        ?>
                           
                           <li class="nav-item"> 
                              <a class="nav-link collapsed" href="dashboard.php?page=pages/users/admin/index"> 
                                 <i class="bi bi-people"></i> <span>Administrateurs</span> 
                              </a>
                           </li>

                           <li class="nav-item"> 
                              <a class="nav-link collapsed" href="dashboard.php?page=pages/users/participant/index"> 
                                 <i class="bi bi-people"></i> <span>Membres</span> 
                              </a>
                           </li>

                           <li class="nav-item"> 
                              <a class="nav-link collapsed" href="dashboard.php?page=pages/participants/index"> 
                                 <i class="bi bi-people"></i> <span>Participant</span> 
                              </a>
                           </li>

                           <li class="nav-item"> 
                              <a class="nav-link collapsed" href="dashboard.php?page=pages/drivers/index"> 
                                 <i class="bi bi-person-circle"></i> <span>Chauffeurs</span> 
                              </a>
                           </li>
                           <li class="nav-item"> 
                              <a class="nav-link collapsed" href="dashboard.php?page=pages/cars/index"> 
                                 <i class="bx bxs-car"></i> <span>Voitures</span> 
                                 
                              </a>
                           </li>
                           <li class="nav-item"> 
                              <a class="nav-link collapsed" href="dashboard.php?page=pages/hotels/index"> 
                                 <i class="bi bi-building"></i> <span>Hotels</span> 
                              </a>
                           </li>
                           <li class="nav-item"> 
                              <a class="nav-link collapsed" href="dashboard.php?page=pages/events/index"> 
                                 <i class="bi bi-clock-history"></i> <span>Soirees</span> 
                              </a>
                           </li>
                           <li class="nav-item"> 
                              <a class="nav-link collapsed" href="dashboard.php?page=pages/programs/index"> 
                                 <i class="bi bi-file-earmark-arrow-up-fill"></i> <span>Programmes</span> 
                              </a>
                           </li>
                           <li class="nav-item"> 
                              <a class="nav-link collapsed" href="dashboard.php?page=pages/notifications/index"> 
                                 <i class="bi bi-envelope-fill"></i> <span>Message</span> 
                              </a>
                           </li>
                           
                           <li class="nav-item"> 
                              <a class="nav-link collapsed" href="dashboard.php?page=pages/lieux/index"> 
                                 <i class="bi bi-geo-fill"></i> <span>Lieu touristiques</span> 
                              </a>
                           </li>

                        <?php	
                     }else{

                        ?>
                           
                        <!-- <li class="nav-item"> 
                           <a class="nav-link collapsed" href="dashboard.php?page=pages/users/admin/index"> 
                              <i class="bi bi-people"></i> <span>Administrateurs</span> 
                           </a>
                        </li> -->

                        <li class="nav-item"> 
                           <a class="nav-link collapsed" href="dashboard.php?page=pages/users/participant/index"> 
                              <i class="bi bi-people"></i> <span>Membres</span> 
                           </a>
                        </li>
                        <li class="nav-item"> 
                           <a class="nav-link collapsed" href="dashboard.php?page=pages/drivers/index"> 
                              <i class="bi bi-person-circle"></i> <span>Chauffeurs</span> 
                           </a>
                        </li>
                        <li class="nav-item"> 
                           <a class="nav-link collapsed" href="dashboard.php?page=pages/cars/index"> 
                              <i class="bx bxs-car"></i> <span>Voitures</span> 
                              
                           </a>
                        </li>
                        <li class="nav-item"> 
                           <a class="nav-link collapsed" href="dashboard.php?page=pages/hotels/index"> 
                              <i class="bi bi-building"></i> <span>Hotels</span> 
                           </a>
                        </li>
                        <li class="nav-item"> 
                           <a class="nav-link collapsed" href="dashboard.php?page=pages/events/index"> 
                              <i class="bi bi-clock-history"></i> <span>Soirees</span> 
                           </a>
                        </li>
                        <li class="nav-item"> 
                           <a class="nav-link collapsed" href="dashboard.php?page=pages/programs/index"> 
                              <i class="bi bi-file-earmark-arrow-up-fill"></i> <span>Programmes</span> 
                           </a>
                        </li>
                        <li class="nav-item"> 
                           <a class="nav-link collapsed" href="dashboard.php?page=pages/notifications/index"> 
                              <i class="bi bi-envelope-fill"></i> <span>Message</span> 
                           </a>
                        </li>
                        
                        <li class="nav-item"> 
                           <a class="nav-link collapsed" href="dashboard.php?page=pages/lieux/index"> 
                              <i class="bi bi-geo-fill"></i> <span>Lieu touristiques</span> 
                           </a>
                        </li>

                     <?php	

                     }
                  
                  ?>
      
                  <?php
               }

         }
         
      ?>
                        
      
   </ul>
</aside>