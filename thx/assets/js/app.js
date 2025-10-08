let name = document.getElementById("name");
let phone = document.getElementById("phone");
let form = document.getElementById("order_form");
let btn = document.getElementById("btn");
let sel = document.getElementById("sel");

function selProduct(id) {
  sel.value = id;
}

function setWithExpiry(key, value, ttl) {
  const now = new Date();

  const item = {
    value: value,
    expiry: now.getTime() + ttl,
  };

  localStorage.setItem(key, JSON.stringify(item));
}

function setButtonSubmitProperties() {
  btn.style.opacity = "0.7";
  btn.textContent = "Отправка заявки";
  btn.disabled = true;
}

form.addEventListener("submit", function () {
  setButtonSubmitProperties();

  let formData = {
    name: name.value,
    phone: phone.value,
  };

  setWithExpiry("myKey", formData, 20000);
});

document.addEventListener("DOMContentLoaded", function () {
  $("a[href^='#']").click(function () {
    var _href = $(this).attr("href");
    $("html, body").animate({ scrollTop: $(_href).offset().top + "px" });
    return false;
  });
});

function getWithExpiry(key) {
  const itemStr = localStorage.getItem(key);

  if (!itemStr) {
      return null;
  }

  const item = JSON.parse(itemStr);
  const now = new Date();

  if (now.getTime() > item.expiry) {
      localStorage.removeItem(key);
      return null;
  }

  let nameUser = item.value.name;
  let phoneUser = item.value.phone;

  let name = document.getElementById("user-info-name");
  let phone = document.getElementById("user-info-phone");

  name.value = `Имя: ${nameUser}`;
  phone.value = `Номер: ${phoneUser}`;
}

getWithExpiry("myKey");