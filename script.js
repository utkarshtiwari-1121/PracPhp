const form = document.getElementById("myForm");
const span = document.querySelectorAll("span");

form.addEventListener("submit", async (e) => {
  e.preventDefault();

  const formData = new FormData(form);

  // for(let [key, value] of formData.entries()) {
  //     console.log(key , value);
  // }
  const response = await fetch("validate.php", {
    method: "POST",
    body: formData,
  });
  const data = await response.json();

  span.forEach((element) => {
    element.innerText = "";
  });

      if (data.status === "error") {
        // errors show करो
        for (let key in data.errors) {
            document.getElementById(key + "Err").innerText = data.errors[key];
        }
    } else {
        alert(data.message);
        form.reset();
    }

  // .then(response => response.text())
  // .then(data => {
  //     console.log(data);
  // })
  // .catch(error => {
  //     console.error("Error:", error);
  // });

  // formData.forEach((value, key) => {
  //     console.log(key, value);
  // });
  // console.log("Form submitted");
});
