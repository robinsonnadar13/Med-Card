<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
    crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ"
	crossorigin="anonymous">
	<link rel="stylesheet" href="css/resume.css">
  	<title>Resume Form</title>

	<script src="js/resume.js">

    </script>
</head>
<body>

    <div class="container mt-2">
        <div class="row">
          <div class="col"></div>
          <div class="col-sm-7 col-md-9 col-lg-9" >
             <div class="card shadow border-0">
              <div class="card-body" >

                <h1 class="text-center"><i class="fa fa-briefcase icon1" aria-hidden="true" ></i>    Candidate Resume</h1>
                <hr class="style13">
                <form action="#" method="post" enctype="multipart/form-data">
                    
                    <!-- starting of curriculum vitae and cover letter section -->

                    <div class="form-group text-muted">
                        
                        <p> Curriculum Vitae & Cover Letter<p>
                    
                        </div>

                    <hr>
                    
                    <div class="form-group">
                        <label class="extraeffect">Curriculum Vitae</label>
                         <div class="custom-file">
                           <input type="file" name="file" accept="application/pdf" class="custom-file-input" id="file" aria-describedby="inputGroupFileAddon01">
                           <label class="custom-file-label" for="inputGroupFile01">Choose File</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="coverletter" class="extraeffect">Coverletter</label>
                        <textarea name="Cover letter" id="coverletter" class="form-control" cols="30" rows="4"></textarea>
                    </div>

                        <!-- end of curriculum vitae and cover letter section -->
                        
                        
                        <br>
                           
                        <hr class="style13">
                        
                        <!-- start of working preference -->

                         <div class="form-group text-muted">
                        
                            <p>Working preferences<p>
                        
                        </div>	
                           <hr>
                        <div class="form-row">
                          <div class="form-group  col-md-6">
                            <label for="jobcategory" class="extraeffect required">Job Category*</label>
                             <select name="jobcategory" id="jobcategory" class="form-control" required>
                                <option>Choose Category</option>
                                <option>Accounting Assistant</option>
                                <option>Arts, Design, Media</option>
                                <option>Charity & Voluntary</option>
                                <option>Education & Coachs</option>
                                <option>Finance And Business</option>
                                <option>IT & Computer</option>
                                <option>Banking</option>
                                 
                             </select>
                            </div>
                            <div class="form-group  col-md-6">
                             <label for="joblevel" class="extraeffect required">Job Level*</label>
                              <select name="joblevel" id="joblevel" class="form-control" required>
                                <option>Job Type</option>
                                <option>Contract</option>
                                <option>Full-Time</option>
                                <option>Part-time</option>
                                <option>Temporary</option>
                                <option>Freelancer</option>
                                 
                             </select>
                            </div>
                        </div>

                        <div class="form-row">
                           <div class="form-group col-md-6">
                             <label for="language" class="extraeffect">Language</label>
                               <select class="form-control" name="language" >
                                 <option>Choose language</option>
                                 <option>Afrikanns</option>
                                 <option>Albanian</option>
                                 <option>English</option>
                                 <option>Estonian</option>
                                 <option>Georgian</option>
                                 <option>French</option>
                                 <option>German</option>
                                </select>
                            </div> 
                            <div class="form-group col-md-6">
                             <label for="salaryfrom" class="extraeffect">Salary From</label>
                              <input type="text" class="form-control" id="salaryfrom" placeholder="Enter Salary From">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                               <label for="skills" class="extraeffect">Skills</label>
                                <select class="form-control" name="skills">
                                    <option>Choose Skills</option>
                                    <option>HTML5</option>
                                    <option>Css3</option>
                                    <option>Photoshop</option>
                                    <option>Php</option>
                                    <option>Wordpress</option>
                                    <option>Bootstrap</option>
                                    <option>Magento</option>
                                </select>
                                
                            </div>
                            <div class="form-group col-md-6">
                                <label for="experience" class="extraeffect"> Experience</label>
                                <input type="text" class="form-control" placeholder="Enter Experience" id="experience">
                            </div>
                        </div>


                         <!-- end of working preference -->
  
                         <br>
                           <hr class="style13">

                           <!-- start of experience -->
                          <div class="form-group text-muted">
  
                            <p>Experience<p>
  
                            </div>	
                            <hr>

                          <div class="form-row">
                           <div class="form-group col-md-4">
                             <label for="title" class="extraeffect">Title</label>
                              <input type="text" class="form-control" placeholder="" id="title">
                            
                            </div>
                           <div class="form-group col-md-4">
                             <label for="companyname" class="extraeffect">Company Name</label>
                              <input type="text" class="form-control" placeholder="" id="companyname">
                             
                           </div>
                           <div class="form-group col-md-4">
                             <label for="dateindateout" class="extraeffect">Date In - Date Out</label>
                              <input type="text" class="form-control" placeholder="" id="dateindateout">
                            </div> 
                           </div>


                           <div class="form-group">
                            <label for="description1" class="extraeffect">Description</label>
                             <textarea name="description1" class="form-control" id="description1" cols="30" rows="4"></textarea>
                           </div>
                           <div class="wrapper">
                             <button type="submit" class="btn btn-info"> <i class="fa fa-plus icon2" aria-hidden="true"></i> Add More</button>
                            </div>
                           
                           
                            <!-- end of experience -->
                           
                           
                            <br>
                             <hr class="style13">
                           
                           
                             <!-- start of degree -->

                           <div class="form-group text-muted">
                           
                            <p>Latest Degree<p>
                          
                            </div>	
                            <hr>

                         <div class="form-row">
                          <div class="form-group col-md-4">
                            <label for="title1" class="extraeffect">Title</label>
                             <input type="text" class="form-control" placeholder="" id="title1">
                            
                          </div>
                          <div class="form-group col-md-4">
                            <label for="collegename" class="extraeffect">College Name</label>
                             <input type="text" class="form-control" placeholder="" id="collegename">
                            
                           </div>
                           <div class="form-group col-md-4">
                             <label for="dateindateout1" class="extraeffect">Date In - Date Out</label>
                              <input type="text" class="form-control" placeholder="" id="dateindateout1">
                            </div> 
                         </div>


                         <div class="form-group">
                          <label for="description2" class="extraeffect">Description</label>
                           <textarea name="description2" class="form-control" id="description2" cols="30" rows="4"></textarea>
                         </div>
                         <div class="wrapper">
                           <button type="submit" class="btn btn-info"> <i class="fa fa-plus icon2" aria-hidden="true"></i> Add More</button>
                         </div>

                           <!-- end of degree -->
                         
                           <br>
                           <hr class="style13">
                         
                           <!-- start of skill -->

                           <div class="form-group text-muted">
                         
                            <p>Skills<p>
                         
                            </div>	
                            <hr>
                            <div class="form-group">
                              <label for="skilltitle" class="extraeffect">Skill Title</label>
                               <input type="text" id="skilltitle" class="form-control">
                            </div>
                            <div class="wrapper">
                             <button type="submit" class="btn btn-info"> <i class="fa fa-plus icon2" aria-hidden="true"></i> Add More</button>
                            </div>
           
                            <!-- end of skill -->
             
                            <br>
                            <hr class="style13">
             
                            <!-- start of video and demo url -->
                            <div class="form-group text-muted">
                
                                <p>Video and Demo Url<p>
                
                            </div>	
                            <hr>
                            <div class="form-row">
                               <div class="form-group col-md-6">
                                    <label for="videourl" class="extraeffect">Video Url</label>
                                     <input type="text" id="videourl" class="form-control" placeholder="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="videourl1" class="extraeffect">Video Url</label>
                                    <input type="text" id="videourl1" class="form-control" placeholder="">
                                </div>
                            </div>
                   
                            <!-- end of video and demo url -->
                   
                           <br>
                           <hr class="style13">
                   
                           <!-- submit and edit button -->
                   
                            <div class="wrapper">
                             <button type="submit" class="btn btn-success"> <i class="fa fa-check icon2" aria-hidden="true"></i></i> Submit</button>
                              <button type="submit" class="btn btn-danger" style="width: 110px;"> <i class="fa fa-id-badge" aria-hidden="true" ></i> Edit </button>

                            </div>                    
                            
                </form>
            
                
              </div>
            </div>
          </div>
          <div class="col"> </div>
        </div>
      </div>
   
</body>
</html>