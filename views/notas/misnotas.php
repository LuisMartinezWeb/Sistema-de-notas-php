<?php 
    headerNotas();
?>

    <div class="btn-nuevo">
        <button>Nuevo</button>
        <!-- <a href="">Nuevo</a> -->
    </div>

    <div id="popup">
    
            <form action="" id="createNote">
                <article class="cardmodal card-createNote">
                    <header class="card-header">
                        <div class="options">
                        <input type="text" class="input-createNote title-createNote" id="title" placeholder="Titulo">
                            
                            <div>
                            <i class="bx bxs-x-square card-trash-icon close-formCreate"></i>
                            </div>
                                
                        
                        </div>
                        <a href="#" class="link-title-card"></a>
                    </header>
            
                    <div class="card-text">
                    <textarea name="content" id="content" cols="30" rows="10" placeholder="Contenido" class="input-createNote content-createNote" id="content"></textarea>
                        
                    </div>
                    <input type="submit" value="Guardar" class="btn-save">
                    <input type="hidden" name="accion" id="accion" value ="">
                </article>
        
            </form>
        
    </div>

    <section class="card-list">





    </section>


    <?php 
    footerNotas();
?>