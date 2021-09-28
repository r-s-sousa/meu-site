<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
   <div class="container">

      <div class="section-title">
         <h2>Contato</h2>
         <p>Dados sobre como me encontrar ou entrar em contato.</p>
      </div>

      <div class="row" data-aos="fade-in">

         <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
               <div class="address">
                  <i class="icofont-google-map"></i>
                  <h4>Localização:</h4>
                  <p>QGEx - Bloco G - 2º Piso, SMU - Brasília, DF,
                     70630-901</p>
               </div>

               <div class="email">
                  <i class="icofont-envelope"></i>
                  <h4>Email:</h4>
                  <p>rafael_sousa2018@outlook.com</p>
               </div>

               <div class="phone">
                  <i class="icofont-phone"></i>
                  <h4>Ligações:</h4>
                  <p>(61) 9.9434-6828</p>
               </div>

               <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15358.317103853758!2d-47.9167467!3d-15.7733807!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xcb89aaa5dd22aa54!2sCentro%20de%20Desenvolvimento%20de%20Sistemas!5e0!3m2!1spt-BR!2sbr!4v1632057922788!5m2!1spt-BR!2sbr" frameborder="0" style="border:0; width: 100%; height:
                           290px;" allowfullscreen></iframe>
            </div>

         </div>

         <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
               <div class="form-row">
                  <div class="form-group col-md-6">
                     <label for="name">Seu nome</label>
                     <input type="text" name="name" class="form-control" id="name" data-rule="minlen:4" data-msg="Por favor digite
                                 pelo menos 4 letras" />
                     <div class="validate"></div>
                  </div>
                  <div class="form-group col-md-6">
                     <label for="name">Seu Email</label>
                     <input type="email" class="form-control" name="email" id="email" data-rule="email" data-msg="Por favor entre com email válido" />
                     <div class="validate"></div>
                  </div>
               </div>
               <div class="form-group">
                  <label for="name">Assunto</label>
                  <input type="text" class="form-control" name="subject" id="subject" data-rule="minlen:4" data-msg="Por favor digite pelo menos 8 letras no
                              assunto" />
                  <div class="validate"></div>
               </div>
               <div class="form-group">
                  <label for="name">Mensagem</label>
                  <textarea class="form-control" name="message" rows="10" data-rule="required" data-msg="Por favor
                              escreva alguma coisa"></textarea>
                  <div class="validate"></div>
               </div>
               <div class="mb-3">
                  <div class="loading">Carregando</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Sua mensagem foi enviada.
                     Obrigado!</div>
               </div>
               <div class="text-center">
                  <button type="submit" disabled>Enviar mensagem</button>
               </div>
            </form>
         </div>

      </div>

   </div>
</section><!-- End Contact Section -->