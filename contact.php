<?php
$activePage = "Contacto";
include 'maquetado/encabezado.php';
include 'maquetado/body.php';
?>

  <!-- Google reCAPTCHA Script -->
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <!-- contact section -->
  <section class="contact_section layout_padding">
    <div class="container-fluid">
      <div class="col-lg-4 col-md-5 offset-md-1">
        <div class="heading_container">
          <h2>
            Contactanos
          </h2>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 col-md-5 offset-md-1">
          <div class="form_container">
            <form id="formularioContacto" action="formulario_contacto/enviar_correo.php" method="POST">
              <div>
                <input type="text" id="nombre" name="nombre" placeholder="Nombre" autocomplete="off" required />
              </div>
              <div>
                <input type="text" id="apellido" name="apellido" placeholder="Apellido(s)" autocomplete="off"
                  required />
              </div>
              <div>
                <input type="number" id="numero" name="telefono" placeholder="Teléfono" autocomplete="off" required />
              </div>
              <div>
                <input type="email" id="email" name="email" placeholder="Email" autocomplete="off" required />
              </div>
              <div>
                <input type="text" id="mensaje" name="mensaje" class="message-box" placeholder="Mensaje"
                  autocomplete="off" required />
              </div>

              <!-- Recaptcha sention -->
              <div class="g-recaptcha" data-sitekey="6Ld53bMrAAAAAH2uC99zoXhMkNNHV9-_S28R6I_H"></div>
              <div id="recaptchaError" style="display: none; color: red;">
                Por favor, completa el reCAPTCHA antes de enviar.
              </div>
              <!-- end Recaptcha sention -->

              <div class="btn_box">
                <button type="submit">
                  Enviar
                </button>
              </div>
            </form>

            <!-- Modal sention -->
            <div class="modal fade" id="modalExito" tabindex="-1" aria-labelledby="modalExitoLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="modalExitoLabel">Correo Enviado</h5>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                  </div>
                  <div class="modal-body">
                    ¡Tu correo ha sido enviado correctamente!
                  </div>
                  <div class="modal-footer">
                    <button type="button" id="btnRedirigir" class="btn btn-secondary"
                      data-bs-dismiss="modal">Aceptar</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- end modal sention -->

          </div>
        </div>
        <div class="col-lg-7 col-md-6 px-0">
          <div class="map_container">
            <div class="map">
              <div id="googleMap"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end contact section -->

          </div>
        </div>
        <div class="col-lg-7 col-md-6 px-0">
          <div class="map_container">
            <div class="map">
              <div id="googleMap"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end contact section -->

  <script>
    // Modal
    // Esperar que el DOM esté completamente cargado
    document.addEventListener("DOMContentLoaded", function () {
      // Captura el formulario por su ID
      const formulario = document.getElementById("formularioContacto");

      // Captura el evento 'submit' del formulario
      formulario.addEventListener("submit", function (event) {
        event.preventDefault(); // Previene la recarga de la página

        // Verificar si el reCAPTCHA está completado
        if (grecaptcha.getResponse().length === 0) {
          // Mostrar el mensaje de error
          recaptchaError.style.display = "block";
          return; // Detener el envío del formulario
        } else {
          // Ocultar el mensaje de error si está visible
          recaptchaError.style.display = "none";
        }

        // Realizar la petición AJAX
        $.ajax({
          url: "formulario_contacto/enviar_correo.php", // Ruta al archivo PHP que procesa el formulario
          type: "POST",
          data: $(formulario).serialize(), // Serializa los datos del formulario
          dataType: "json", // Espera una respuesta en formato JSON
          success: function (response) {
            if (response.success) {
              // Mostrar el modal cuando se envía el formulario
              const modalExito = new bootstrap.Modal(document.getElementById("modalExito"));
              modalExito.show();

              // Captura el botón del modal para redirigir
              const botonRedirigir = document.getElementById("btnRedirigir");
              botonRedirigir.addEventListener("click", function () {
                window.location.href = "index.php"; // Redirige a la página de inicio
              });
            } else {
              // Manejar el error, por ejemplo, mostrar un mensaje de error
              if (response.message === "Error: reCAPTCHA incompleto") {
                recaptchaError.style.display = "block";
              } else {
                alert("Hubo un error al enviar el correo: " + response.message);
              }
            }
          },
          error: function (xhr, status, error) {
            // Manejar el error de la petición AJAX
            alert("Hubo un error en la petición: " + error);
          }
        });
      });
    });
  </script>
<?php include 'maquetado/footer.php'; ?>