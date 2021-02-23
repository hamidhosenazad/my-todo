<?php

require_once realpath("vendor/autoload.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Wedevs-todo</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap-grid.css" integrity="sha512-M8h1/fViw+JDMilLKMgTWVcTl4HyO4wZf3vtbcXHX8wycvMtL8U/UU+Kwp6HPW+W9kEBCx3QQo1kMSnG2c+Y+Q==" crossorigin="anonymous" />
</head>
<body>
<body>
    <h6 class="todo">todos</h6>
    <div class="content">
        <table>
            <thead>
                <tr>
                    <td>
                        <div class="row">
                            <div class="col-md-1" id="add-icon">
                            </div>
                            <div class="col-md-11">
                                <form method="post" action="src/Main.php" id="form-add">
                                    <input type="text"  placeholder="What needs to be done?" name="title" id="title" class="add-input"/>
                                    <input type="submit" class="add-todo-submit"/>
                                </form>
                            </div>
                        
                        </div> 
                        
                    </td>
                </tr>
                
            </thead>
            <tbody>
                
            </tbody>
            <tfoot style="visibility: hidden;">
                <tr>
                    <td><div class="row">
                            <div class="col-md-4" >
                                <span id="status"></span> items left
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-4">
                                        <span class="all pointer">All</span>
                                    </div>
                                    <div class="col-md-4">
                                        <span class="all-active pointer">Active</span>
                                    </div>
                                    <div class="col-md-4">
                                    <span class="all-completed pointer">Completed</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4" style="text-align: right;">
                                <span class="delete pointer">Clear completed</span>
                            </div>
                        </div>
                    </td>
                </tr>
            </tfoot>
        </table>
        <div class="pages first-page">
            
        </div>
        <div class="pages second-page">
                
        </div>
    </div>                            
</body>
</body>
<script src="assets/js/custom.js"></script>
</html>

