<form action="" method="post">
  <div class="row m-3 p-3 justify-content-center">
    <a href="/add-product" class="btn btn-success m-2 col-md-5">
      <i class="bi bi-stars"></i>
      New Product
    </a>
    <button type="submit" class="btn btn-danger m-2 col-md-5">
      <i class="bi bi-trash3-fill"></i>
      Mass Delete
    </button>
  </div>
  <h1 class=" mb-3 p-2 text-light">Product List </h1>

  <div class="card-deck">
      <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
          <div class="card" style="border-color: #c90314;">
            <div class="card-header">
              <input type="checkbox" name="sku" class="form-check-input mt-0">
            </div>
            <div class="card-body" style="background-color: #dc3545;">
              <h5 class="card-title text-light">
                <i class="bi bi-pencil-square p-2"  style="font-size: 1.5rem; color: #f9f3f3;"></i>
                Product title
              </h5>
              <h5 class="card-title text-light">
                <i class="bi bi-qr-code p-2"  style="font-size: 1.5rem; color: #f9f3f3;"></i>
                Product SKU
              </h5>
              <h5 class="card-title text-light">
                <i class="bi bi-cash-coin p-2"  style="font-size: 1.5rem; color: #f9f3f3;"></i>
                Product Price
              </h5>
              <h5 class="card-title text-light">
                <i class="bi bi-info-square p-2"  style="font-size: 1.5rem; color: #f9f3f3;"></i>
                Product Attribute
              </h5>
            </div>
            <div class="card-footer">
              last updated at:
            </div>
          </div>
        </div>      
      </div>
  </div>
</form>