<template>
    
    <div class="container">
        <header class="  navbar navbar-expand-lg  ">
            
            <div id="mobile" class="w-100 d-block d-lg-none d-xl-none">
                <div class="d-flex row">
                    <div class="col-6">
                        <img :src="image" max-width="25vh"  alt="" />
                    </div>
                    <div class="col-6 row justify-content-end">
                        
                        <button class="navbar-toggler w-fit-content" type="button"  @click="toggleMenu" id="mobile_menu_button">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                    <div class="col-12 border-top mt-2"  id="mobile_menu" style="display: none;" >
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item"><router-link to="/" class="nav-item nav-link text-darker">O nas</router-link></li>
                <li class="nav-item"><router-link to="/" class="nav-item nav-link text-darker">Zoznam miest</router-link></li>
                <li class="nav-item"><router-link to="/" class="nav-item nav-link text-darker">Inšpekcia</router-link></li>
                <li class="nav-item"><router-link to="/" class="nav-item nav-link text-darker">Kontant</router-link></li>
                <li class="nav-item dropdown mb-2">
                    <button class="btn  dropdown-toggle fs-6 border-0 text-secondary p-0" data-bs-toggle="dropdown" aria-expanded="true">
                        SK
                    </button>
                    <ul class="dropdown-menu dropdown-menu">
                        <li><a class="dropdown-item fs-6 text-secondary" href="#">EN</a></li>
                        <li><a class="dropdown-item fs-6 text-secondary active" href="#">SK</a></li>
                        
                    </ul>
            </li>
            <li>
                <form action="">
            <div class="input-group ">
                <input type="text" class="form-control  searchfield"  aria-label="Search">
               
                   <button type="submit" class="btn  btn-outline-secondary searchbox" ><i class="bi bi-search"></i></button>
                
                </div>
           </form>
            </li>
            <li><router-link to="/register" class="btn login-button fs-6 m-0 mt-2">Prihlasenie</router-link></li>
          </ul>
                    </div>
                </div>
                
            </div>
            <div id="fullsize" class="w-100 d-none d-lg-block d-xl-block">
                <div class=" w-100 d-flex flex-wrap justify-content-center py-3 " >
            <div class="col-5 row">

            <div class="col-12 p-4 pt-0 pb-0"> 
                <img :src="image" width="45%"  alt="" />

            </div>
           <div class="col-12">
            <ul class="nav nav-pills">
                <li class="nav-item"><router-link to="/" class="nav-item nav-link text-darker">O nas</router-link></li>
                <li class="nav-item"><router-link to="/" class="nav-item nav-link text-darker">Zoznam miest</router-link></li>
                <li class="nav-item"><router-link to="/" class="nav-item nav-link text-darker">Inšpekcia</router-link></li>
                <li class="nav-item"><router-link to="/" class="nav-item nav-link text-darker">Kontant</router-link></li>


            </ul>
        </div>
        </div>
        <div class="col-7 row   justify-content-end"> 
            <div class="col-5 p-0  d-flex justify-content-end" >
                <a href="#" class="text-decoration-none fs-6 fw-medium link-color mt-1 h-fit-content">Kontakty a čisla na oddelenia</a>
                
                
                
            </div>
            <div class="col-1 p-0">
                <ul class="navbar-nav ">
                    <li class="nav-item dropdown">
                    <button class="btn  dropdown-toggle fs-6 border-0 text-secondary" data-bs-toggle="dropdown" aria-expanded="true">
                        SK
                    </button>
                    <ul class="dropdown-menu dropdown-menu">
                        <li><a class="dropdown-item fs-6 text-secondary" href="#">EN</a></li>
                        <li><a class="dropdown-item fs-6 text-secondary" href="#">SK</a></li>
                        
                    </ul>
                    </li>
                </ul>
            </div>
            <div class="col-4">
           <form action="">
            <div class="input-group ">
                <input type="text" class="form-control  searchfield"  aria-label="Search">
               
                   <button type="submit" class="btn  btn-outline-secondary searchbox" ><i class="bi bi-search"></i></button>
                
                </div>
           </form>
        </div>
        <div class="col-2 p-0"> <router-link to="/register" class="btn login-button  fs-6">Prihlasenie</router-link></div>
           
        </div>
    </div>
          
</div> 
        </header>
    </div>

        <router-view class="m-0"> </router-view>
        <footer class="footer mt-0">
        <div class="bg-footer">
        <div class="container-fluid container text-secondary pt-5 ">
            
       
            <div class="row">
            <div class="col-md-3 col-sm-12">
                <h6 class="text-footer fw-bold">ADRESA A KONTAKT</h6>
                <ul class="list-unstyled">
                    <li>ŠÚKL</li>
                    <li>Kvetná 11</li>
                    <li>825 08 Bratislava 26</li>
                    <li>Ústredňa:</li>
                    <li>+421-2-50701 111</li>
                    
                </ul>
                    <h6 class="text-footer fw-bold">KONTAKTY</h6>
                <ul class="list-unstyled link-list-footer">
                    <li><a href="#">telefónne čísla</a></li>
                    <li><a href="#">adresa</a></li>
                    <li><a href="#">úradné hodiny</a></li>
                    <li><a href="#">bankové spojenie</a></li>
                </ul>
                <h6 class="text-footer fw-bold">INFORMÁCIE PRE VEREJNOSŤ</h6>
                <ul class="list-unstyled link-list-footer">
                    <li><a href="#">zoznam vyvezených liekov</a></li>
                    <li><a href="#">MZ SR</a></li>
                    <li><a href="#">Národný portál zdravia</a></li>
                    
                </ul>
            </div>
            <div class="col-md-3 col-sm-12">
                <h6 class="text-footer fw-bold">O NÁS</h6>
                <ul class="list-unstyled link-list-footer">
                    <li><a href="#">O NÁS</a></li>
                    <li><a href="#">Dotazníky</a></li>
                    <li><a href="#">Hlavní predstavitelia</a></li>
                    <li><a href="#">Základné dokumenty</a></li>
                    <li><a href="#">Zmluvy za ŠÚKL</a></li>
                    <li><a href="#">História a súčasnosť</a></li>
                    <li><a href="#">Národná spolupráca</a></li>
                    <li><a href="#">Medzinárodná spolupráca</a></li>
                    <li><a href="#">Poradné orgány</a></li>
                    <li><a href="#">Legislatíva</a></li>
                    <li><a href="#">Priestupky a iné správne delikty</a></li>
                    <li><a href="#">Zoznam dlžníkov</a></li>
                    <li><a href="#">Sadzobník ŠÚKL</a></li>
                    <li><a href="#">Verejné obstarávanie</a></li>
                    <li><a href="#">Vzdelávacie akcie a prezentácie</a></li>
                    <li><a href="#">Konzultácie</a></li>
                    <li><a href="#">Voľné pracovné miesta (0)</a></li>
                    <li><a href="#">Poskytovanie informácií</a></li>
                    <li><a href="#">Sťažnosti a petície</a></li>
                </ul>
            </div>
            <div class="col-md-3 col-sm-12">
                <h6 class="text-footer fw-bold">MÉDIÁ</h6>
                <ul class="list-unstyled link-list-footer">
                    <li><a href="#">Tlačové správy</a></li>
                    <li><a href="#">Lieky v médiách</a></li>
                    <li><a href="#">Kontakt pre média</a></li>
                    
                </ul>
                <h6 class="text-footer fw-bold">DATABAZY A SERVIS</h6>
                <ul class="list-unstyled link-list-footer">
                    <li><a href="#">Databáza liekov a zdravotníckych pomôcok</a></li>
                    <li><a href="#">Iné zoznamy</a></li>
                    <li><a href="#">Kontaktný formulár</a></li>
                    <li><a href="#">Mapa stránok</a></li>
                    <li><a href="#">A - Z index</a></li>
                    <li><a href="#">Linky</a></li>
                    <li><a href="#">RSS</a></li>
                    <li><a href="#">Doplnok pre internetový prehladavač</a></li>
                    <li><a href="#">Prehliadače formátov</a></li>
                </ul>
            </div>
            <div class="col-md-3 col-sm-12">
                <h6 class="text-footer fw-bold">DROGOVÉ PREKURZORY</h6>
                <ul class="list-unstyled link-list-footer">
                    <li><a href="#">Aktuality</a></li>
                    <li><a href="#">Legislativa</a></li>
                    <li><a href="#">Linky</a></li>
                </ul>
                <h6 class="text-footer fw-bold">INE</h6>
                <ul class="list-unstyled link-list-footer">
                    <li><a href="#">Linky</a></li>
                    <li><a href="#">Mapa stranok</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Podmenky pouzivania</a></li>
                </ul>
                <h6 class="text-primary fw-bold">RAPID ALERT SYSTEM</h6>
                <a href="#">Rýchla výstraha vyplývajúca z nedostatkov v kvalite liekov</a>
            </div>
            
        </div>
        
      
    
        </div>
        </div>
    </footer>
    
</template>
 
<script>
import image from "./assets/logo.png"
import $ from "jquery";
    export default {
        data: function () {
            return {
                isMenuVisible: false,
                image: image
            }
        
        },
        methods: {
        toggleMenu() {
        if (this.isMenuVisible) {
            $('#mobile_menu').slideUp(200);
            
        } else {
            $('#mobile_menu').slideDown(200);
            
        }
        this.isMenuVisible = !this.isMenuVisible;
        }
        }
    }
</script>