  <!DOCTYPE html>
  <html lang="en">

  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <style>
          body {
              height: 100vh;
          }

          .container {
              display: flex;
              justify-content: center;
              align-items: center;
              height: 100%;
          }

          .form-container {
              width: 600px;
              padding: 20px;
              background-color: #f8f9fa;
              border-radius: 10px;
          }

          .center-button {
              display: flex;
              justify-content: center;
              margin-top: 20px;
          }

          .center-button button {
              margin-right: 10px;
          }
      </style>

      <title>Tambah Pelanggan</title>
  </head>

  <body>
      <div class="container">
          <div class="form-container">
              <h2>Tambah Data Paket Laundry</h2>
              <form method="post" enctype="multipart/form-data">
                  <div>
                      <label for="nama">ID Paket Laundry</label>
                      <input type="text" maxlength="50" class="form-control" name="id_paket" id="id_paket" placeholder="Masukkan ID Paket Laundry" required autofocus> <br>
                  </div>
                  <div>
                      <label for="paket">Paket</label>
                      <input type="file" class="form-control" name="paket" required> <br>
                  </div>
                  <div>
                      <label for="harga_kilo">harga / kilo</label>
                      <input type="text" maxlength="30" class="form-control" name="harga_kilo" id="harga_kilo" placeholder="harga / kilo" required> <br>
                  </div>
                  <div>
                      <label for="deskripsi">Deskripsi</label>
                      <input type="text" maxlength="100" class="form-control" name="deskripsi" id="deskripsi" placeholder="deskripsi" required><br>
                  </div>
                  <div class="center-button">
                      <button type="reset" class="btn btn-danger mr-2"><i class="fas fa-undo"></i> Reset</button> <br>
                      <button type="submit" name="submit" class="btn btn-success"><i class="fas fa-save"></i> Save</button>
                  </div>
              </form>
          </div>
      </div>
      <!-- Popper and Bootstrap JS -->
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

  </body>

  </html>
