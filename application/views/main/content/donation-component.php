<div class="flex flex-col justify-center items-center w-full my-8">
  <div class="text my-2">
    <h2 class="text-4xl font-bold font-awesome">DONATE NOW</h2>
  </div>
  <div class="flex flex-row justify-around items-center my-2">
    <div class="photo w-2/5">
      <img src="<?= base_url('assets/images/dummy/poorkid1.png') ?>" alt="" class=" rounded-lg">
    </div>
    <div class="donation-form w-2/5">
      <form action="" class="flex flex-col m-10 space-y-4  md:place-self-start  donationForm w-full">
        <div for="name" class="flex flex-col space-y-2 ">
          <h4 class=" ">Name: </h4>
          <input type="text" name="fullname" id="fullname" placeholder="Full Name" class=" p-2 rounded-sm " required>
        </div>
        <div for="address" class="flex flex-col space-y-2">
          <h4 class="">Address: </h4>
          <input type="text" name="address" id="address" placeholder="Country, State, City, Road, House no" class="p-2 rounded-sm "
            required>
        </div>
        <div for="email" class="flex flex-col space-y-2">
          <h4 class="">Email: </h4>
          <input type="email" name="email" id="email" placeholder="abc@gmail.com" class="p-2 rounded-sm " required>
        </div>
        <div for="contact" class="flex flex-col space-y-2">
          <h4 class="">Contact no: </h4>
          <input type="number" name="contact" id="contact" placeholder="9929922222" class="p-2 rounded-sm " required>
        </div>
        <div for="pan" class="flex flex-col space-y-2">
          <h4 class="">Pan no: </h4>
          <input type="text" name="pan" id="pan" placeholder="XXXXXX..." class="p-2 rounded-sm " required>
        </div>
        <div for="children" class="flex flex-col space-y-2">
          <h4 class="">How many children?</h4>

          <div class="flex flex-col">
            <select name="childrenId" id="childrenId" class="p-2 rounded-sm ">
              <option value="1" selected>1</option>
              <option value="2">2</option>
              <option value="3">3</option>
            </select>
          </div>
        </div>
        <div>
          <input class="donate-btn bg-[#f5ab35] text-white 
              py-3 px-5 rounded-[5px] lineweight-500 cursor-pointer border-0" type="submit" value="Donate"
            id="donationSubmitBtn">
        </div>
      </form>
    </div>


  </div>
</div>