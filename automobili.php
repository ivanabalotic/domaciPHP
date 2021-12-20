<?php include_once 'header.php'; ?>

<p id="car-img" class="rounded-pill"><i class="fas fa-car"></i></p>
<p class="text-center text-uppercase izaberite-p">Izaberite automobil</p>

<div class="text-center d-flex flex-wrap">
  <label for="exampleFormControlSelect2" class="mr-3">Sortiraj po </label>
  <select class="form-control mr-3" style="width: 150px;" id="exampleFormControlSelect2">
    <option></option>
    <option value="cena">Ceni</option>
    <option value="snaga">Snazi</option>
    <option value="godina">Godini</option>
  </select>
  <form id="search-form2" class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" id="search-input" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
</div>

<?php

$db->select("automobili", $rows = "*", null, null, null);
$automobili = $db->getResult()->fetch_all(MYSQLI_ASSOC);

?>

<section id="cars" class="mb-5">
  <div class="container">
    <div class="row" id="automobili-container">

      <?php foreach ($automobili as $automobil) : ?>

        <div class="col-md-4 col-sm-6 col-12 mt-4">
          <div class="card">
            <div class="card-img">
              <img src="<?php echo $automobil['img']; ?>" alt="">
              <div class="card-polovan">
                <?php

                if ($automobil['polovan']) {
                  echo "POLOVAN";
                } else {
                  echo "NOV";
                }

                ?>
              </div>
            </div>
            <div class="card-sadrzaj">
              <h4 class="card-naziv"><?php echo $automobil['marka'] . " " . $automobil['naziv'] . " " . $automobil['kubikaza'] . "cm3"; ?></h4>
              <p class="card-cena"><?php echo $automobil['cena']; ?> E</p>
              <p class="card-opis"><?php echo substr($automobil['opis'], 0, 250); ?></p>
              <div class="card-specs">
                <div class="spec"><i class="far fa-calendar-alt"></i><br><?php echo $automobil['godina']; ?></div>
                <div class="spec"><i class="fas fa-road"></i><br><?php echo $automobil['kilometraza']; ?> KM</div>
                <div class="spec"><i class="fas fa-gas-pump"></i><br><?php echo $automobil['gorivo']; ?></div>
                <div class="spec"><i class="fas fa-horse-head"></i><br><?php echo $automobil['konjaza']; ?> HP</div>
              </div>

            </div>
          </div>
        </div>

      <?php endforeach; ?>


    </div>
  </div>
</section>

<?php include_once 'footer.php'; ?>