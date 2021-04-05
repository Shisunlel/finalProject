<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!-- Bootstrap 5 -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
      crossorigin="anonymous"
    />
    <!-- Custom Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&family=Poppins:wght@300;400;600&family=Akaya+Telivigala&family=RocknRoll+One&family=Oswald&display=swap"
      rel="stylesheet"
    />
    <!-- Custom CSS -->
    <title>Rentahouse |Checkout</title>
  </head>
  <body>
    <!--Main layout-->
    <main class="mt-5 pt-4">
      <div class="container wow fadeIn">
        <!-- Heading -->
        <h2 class="my-5 h2">Confirm and pay</h2>
        <!--Grid row-->
        <div class="row">
          <!--Grid column-->
          <div class="col-md-8 mb-3 bg-light p-5">
            <div>
              <form 
              action="{{ route('checkout') }}"
              id="checkout__form"
              method="POST"
              >
              @csrf
                <!--Grid row-->
                <div class="md-form mb-3">
                  <label><strong>Date</strong></label>
                  <div class="justify-content-between d-flex">
                    <p>24/03/2021</p>
                    <a href="#"><u>Edit</u></a>
                  </div>
                </div>
                <div class="md-form mb-3">
                  <label><strong>Guest</strong></label>
                  <div class="justify-content-between d-flex">
                    <p>2 Guest</p>
                    <a href="#"><u>Edit</u></a>
                  </div>
                </div>
                <hr />

                <!--Pay-->
                <label><strong>Pay With</strong></label>
                <select class="form-select mt-2 mb-3" name="Pay-type" aria-label="Default select example">
                  <option selected>Credit Cards or Wings</option>
                  <option value="Credit Cards">Credit Cards</option>
                  <option value="Wings">Wings</option>
                </select>
                <!--email-->
                <label><strong>Billing Address</strong></label>
                <div class="md-form mt-2 mb-4">
                  <input
                    type="text"
                    name="Address"
                    class="form-control"
                    placeholder="Street Address"
                    required
                  />
                  <input
                    type="text"
                    name="HouseNumber"
                    class="form-control"
                    placeholder="House Number"
                    required
                  />
                </div>

                <span><strong>Required</strong></span>
                <div class="md-form mt-2">
                  <label>Phone Number</label>
                  <div class="justify-content-between d-flex">
                    <small class="text-muted"
                      >Add and confirm your phone number to get updated</small
                    >
                    <a href="#"><u>Add</u></a>
                  </div>
                </div>
                <div class="md-form mb-3">
                  <label>Profile Picture</label>
                  <div class="justify-content-between d-flex">
                    <small class="text-muted"
                      >Hosts want to know who will be staying at their
                      place</small
                    >
                    <a href="#"><u>Add</u></a>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="cc-name">Name on card</label>
                    <input
                      type="text"
                      class="form-control"
                      name="card-name"
                      placeholder="Name"
                      required
                    />
                    <small class="text-muted"
                      >Full name as displayed on card</small
                    >
                    <div class="invalid-feedback">Name on card is required</div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="cc-number">Credit card number</label>
                    <input
                      type="text"
                      class="form-control"
                      name="card-number"
                      placeholder="xxxx xxxx xxxx xxxx"
                      required
                    />
                    <div class="invalid-feedback">
                      Credit card number is required
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3 mb-3">
                    <label for="cc-expiration">Expiration</label>
                    <input
                      type="text"
                      class="form-control"
                      name="card-expiration"
                      placeholder="MM/YY"
                      required
                    />
                    <div class="invalid-feedback">Expiration date required</div>
                  </div>
                  <div class="col-md-3 mb-3">
                    <label for="cc-expiration">CVV</label>
                    <input
                      type="text"
                      class="form-control"
                      name="cc-cvv"
                      placeholder="xxxx"
                      required
                    />
                    <div class="invalid-feedback">Security code required</div>
                  </div>
                </div>
                <hr class="mb-4" />
                <button class="btn btn-primary btn-lg btn-block" type="submit">
                  Continue to checkout
                </button>
              </form>
            </div>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-md-4 mb-4">
            <!-- Heading -->
            <h4 class="d-flex justify-content-between align-items-center mb-3">
              <span class="text-muted">Payments</span>
              <span class="badge badge-secondary badge-pill">3</span>
            </h4>

            <ul class="list-group mb-3 z-depth-1">
              <li
                class="list-group-item d-flex justify-content-between bg-light"
              >
              <div class="row">
                <div class="col-6">
                <img
                  src="https://cf.bstatic.com/images/hotel/max1024x768/213/213503501.jpg"
                  class="img-fluid rounded img-thumbnail" style=" width:90%;"
                />
                </div>
                <div class="col-6 text-center">
                <div>
                  <small class="text-muted">Address</small>
                </div>                
                <div>
                  <label>House name</label>
                </div>
                <div>
                  <small class="text-muted">1 bed 1 bathroom</small>
                </div>
                
                <div class="">
                  <label>star</label>
                </div>
              </div>

              </div>
              </li>

              <li class="list-group-item">
                <div class="mb-2">
                  <strong>Price Detail</strong>
                </div>
                <div class="d-flex justify-content-between mb-2">
                  <span>$40.00 x 2 months</span>
                  <label>$80</label>
                </div>
                <div class="d-flex justify-content-between mb-2">
                  <u>Service fees</u>
                  <label>$3.00</label>
                </div>
                <div class="d-flex justify-content-between mt-4">
                  <span>Total (USD)</span>
                  <strong>$83.00</strong>
                </div>
              </li>
            </ul>
          </div>
          <!--Grid column-->
        </div>
        <!--Grid row-->
      </div>
    </main>
    <!--Main layout-->
  </body>
</html>
