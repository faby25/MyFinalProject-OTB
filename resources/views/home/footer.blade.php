{{-- <footer class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-6 px-10 mt-16">
    <img src="./images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
    <h5 class="text-3xl">Comunicarse con Administracion de OTB-SUCA</h5>
    <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>
    <div class="mt-10">
        <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">
            <form method="POST" action="#" class="flex text-sm ">
                <div class="lg:py-3 lg:px-5 flex items-center">
                    <label for="email" class="hidden lg:inline-block">
                        <img src="./images/mailbox-icon.svg" alt="mailbox letter">
                    </label>
                    <input id="email" type="text" placeholder="Your email address" class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                </div>
                <button type="submit" class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8">
                    Enviar
                </button>
            </form>
        </div>
    </div>
</footer> --}}


<footer id="Footer" class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-6 px-10 mt-12 wrapper">
        <div class="row">
            <div class="form-group col">
                      <div class="inline-flex">
                        <x-application-logo class="h-20 w-auto" id="1"/>
                      </div>
                        <ul class="contact">
                            <li><i class="fas fa-map-marker-alt"></i><a href="#" target="_blank" rel="noopener">Calle 95 # 71 -45. Cochabamba-Quillacollo</a></li>
                            <li><i class="far fa-envelope"></i><a href="mailto:SuperrAddmin@gmail.com">SuperrAddmin@gmail.com</a></li>
                            <li><i class="far fa-envelope"></i><a href="mailto:AddminOTB@gmail.com">AddminOTB@gmail.com</a></li>
                        </ul>
                        <div class="social">
                            <h5 class="mt-2 lg:mt-0 lg:ml-3 text-ms font-bold uppercase py-2 px-8">
                                Nuestras Redes Sociales:
                            </h5>
                            <div class="lg:mt-0 lg:ml-2">
                                <a href="https://www.facebook.com/Faby.M2S5" target="_blank" class="facebook" title="Facebook" rel="noopener"><i class="fab fa-facebook-f"></i></a>
                                <a href="https://www.instagram.com/faby.m2s5/" target="_blank" class="instagram" title="Instagram" rel="noopener"><i class="fab fa-instagram"></i></a>
                                <a href="#" target="_blank" class="twitter" title="Twitter" rel="noopener"><i class="fab fa-twitter"></i></a>
                                <a href="https://github.com/faby25" target="_blank" class="github" title="Github" rel="noopener"><i class="fab fa-github"></i></a>
                            </div>
                        </div>
            </div>
            <div class="col">
                <aside>
                    <h3 class="text-2xl">Descripción del Sistema:</h3>
                    <div>
                        <p class="mt-3">Este es un sistema administrativo para el control de pagos de agua de la OTB-SUCA</p>
                        <div class="items-center mt-3">
                          <div class="inline-flex">
                            <x-application-logo class="h-20 w-auto" id="otbsuca.jpg"/>
                          </div>
                        </div>
                        <a href="http://otb-suca.herokuapp.com/" class="transition-colors duration-300 hover:blue-600 mt-3 lg:mt-0 lg:ml-3 font-semibold py-3 px-8">otb-suca.herokuapp.com</a>
                    </div>
                </aside>
                <hr>
            </div>
            <div class="col">
                <aside >
                  <img src="./images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-3" style="width:80px;">
                  <h3 class="mt-2 lg:mt-0 lg:ml-3 text-ms font-bold uppercase py-2 px-8">
                      Nuestro equipo:</h3>
                        <ul class="contact">
                          <li>
                            <div class="name">Fabiola D. Morales Siles</div>
                            <a href="tel: +59172248669" class="tel"><i class="fas fa-mobile-alt"></i> (+591) 7 2248 669</a>
                            <a href="mailto:moralessfaby1@gmail.com" class="mail"><i class="far fa-envelope"></i>MoralessFaby1@gmail.com</a>
                          </li>
                            <li>
                                <p class="name">Fabiola D. Morales Siles</p>
                                <a href="tel: +59172248669" class="tel"><i class="fas fa-mobile-alt"></i> (+591) 7 2248 669</a>
                                <a href="mailto:faby025494@gmail.com" class="mail"><i class="far fa-envelope"></i>faby025494@gmail.com</a>
                            </li>
                        </ul>
                </aside>
            </div>
    </div>
    {{-- <div class="footer_copy">
        <div class="container">
                <div class="copyright">
                      @include('layouts._footer')
                  </div>
        </div>
    </div> --}}
</footer>
