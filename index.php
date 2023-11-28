<!DOCTYPE html">
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tareas PHP</title>
    <link rel="stylesheet" href="styles.css"/>
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.17.11/dist/css/uikit.min.css" />
    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.17.11/dist/js/uikit.min.js"></script>
    <!-- Uikit icons -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.17.11/dist/js/uikit-icons.min.js"></script>
</head>
<body class="uk-background-secondary">
    <div class="uk-container uk-container-xsmall uk-padding uk-background-muted uk-height-1-1">
        <h1 class="uk-text-center uk-heading-small">Lista de tareas</h1>        
        <form action="./acciones/agregarTarea.php" method="post">
            <fieldset class="uk-fieldset">
                <div class="uk-margin ">
                    <div class="uk-inline uk-width-1-1">
                        <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon:pencil"></span>
                        <input type="text" class="uk-input" name="tarea" required>   
                    </div>
                </div>  
                <div class="uk-margin uk-text-center">      
                    <button type="submit" class="uk-button-default uk-button-small uk-button-primary">Añadir tarea</button>
                </div>
            </fieldset>
        </form>
        <hr class="uk-divider-icon">
        <ul uk-tab>
            <li class="uk-active"><a href="">Pendientes</a></li>
            <li><a href=""></a></li>
            <li><a>Realizadas</a></li>
        </ul>
        <form action="./acciones/borrarTarea.php" method="post">
            <table class="uk-table" id="t">
                <thead>
                    <th>Tarea</th>
            <!--    <th class="uk-text-center">Hecha</th>   -->
                    <th class="uk-text-center">Borrar</th>                
                </thead>
                <tbody>                
                        <?php                            
                            include './acciones/listaTareas.php';
                            if ($arrayTareas != null){
                                    foreach ($arrayTareas as $itemTarea){
                                        echo "
                                        <tr>
                                            <td>".$itemTarea['tarea']."</td>
                                            <input type='hidden' value='".$itemTarea['id_tarea']."' name='id'>
                                            <td class='uk-text-center'>                                            
                                            <button type='submit' class='uk-button uk-button-danger'><span uk-icon='icon: trash'></span></button>
                                            </td>
                                        </tr>   
                                            ";                         
                                    }                        
                            }
                        ?>              
                </tbody>
            </table>
        </form>
    </div>
    <script>

        var i, checkboxes = document.querySelectorAll('input[type=checkbox]');
        
        document.getElementById("t").onload{
            function load_() {
                for (i = 0; i < checkboxes.length; i++) {
                    checkboxes[i].checked = localStorage.getItem(checkboxes[i].value) === 'true' ? true:false;
                }
            } 
        }    

        document.getElementById("t").onchange{                       
            function save() {
                for (i = 0; i < checkboxes.length; i++) {
                    localStorage.setItem(checkboxes[i].value, checkboxes[i].checked); 
                }
            }
        }        

    </script>
</body>
</html>