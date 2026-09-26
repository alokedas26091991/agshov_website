
  
  <div class="container text-center p-4 bg-white rounded shadow mt-5">
    <h2 class="spec-tags">Complete Your Payment Securely</h2>

    <p class="animated-text-payment">Pay the Amount using any of the scanners below for a quick and hassle-free checkout.<br> Just scan and pay!</p>
    <div class=" mt-4 row">
        <div class="col-lg-6 col-sm-6">
      <img src="/webroot/img/google-pay-scanner.jpg" alt="Paytm Scanner" class="scanner">
        </div>
           <div class="col-lg-6 col-sm-6">
      <img src="/webroot/img/paytm-scanner.jpg" alt="Google Pay Scanner" class="scanner">
               
           </div>
    </div>
  </div>
  
  <script>
      const carouselText = [
  {text: "Paytm", color: "blue"},
  {text: "Google pay", color: "red"},

]

$( document ).ready(async function() {
  carousel(carouselText, "#feature-text")
});

async function typeSentence(sentence, eleRef, delay = 100) {
  const letters = sentence.split("");
  let i = 0;
  while(i < letters.length) {
    await waitForMs(delay);
    $(eleRef).append(letters[i]);
    i++
  }
  return;
}

async function deleteSentence(eleRef) {
  const sentence = $(eleRef).html();
  const letters = sentence.split("");
  let i = 0;
  while(letters.length > 0) {
    await waitForMs(100);
    letters.pop();
    $(eleRef).html(letters.join(""));
  }
}

async function carousel(carouselList, eleRef) {
    var i = 0;
    while(true) {
      updateFontColor(eleRef, carouselList[i].color)
      await typeSentence(carouselList[i].text, eleRef);
      await waitForMs(1500);
      await deleteSentence(eleRef);
      await waitForMs(500);
      i++
      if(i >= carouselList.length) {i = 0;}
    }
}

function updateFontColor(eleRef, color) {
  $(eleRef).css('color', color);
}

function waitForMs(ms) {
  return new Promise(resolve => setTimeout(resolve, ms))
}
  </script>