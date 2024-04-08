const isNumeric = (str) => {
  const regex = /^[0-9.]+$/;
  return regex.test(str);
};

const handleSubmitAdd = async (e) => {
    e.preventDefault();
    const form = document.getElementById("product_form");
    const formData = new FormData(form);
    const data = {};
    formData.forEach((value, key) => {
      data[key] = value;
    });
  
    if (data.product_type === "") {
      alert("Please select a product type");
      return;
    }

    if (data.SKU === "") {
      alert("SKU can't be empty");
      return;
    }
    if (data.name === "") {
      alert("Name can't be empty");
      return;
    }
    if (!isNumeric(data.price) || data.price === "") {
      alert("Price can't be empty and must be a number");
      return;
    }

    if (
      data.product_type === "Disk" &&
      (!isNumeric(data.size) || data.size === "")
    ) {
      alert("Size can't be empty and must be a number");
      return;
    }
    if (
      data.product_type === "Book" &&
      (!isNumeric(data.weight) || data.weight === "")
    ) {
      alert("Weight can't be empty and must be a number");
      return;
    }
    if (data.product_type === "Furniture") {
      if (!isNumeric(data.height) || data.height === "") {
        alert("Height can't be empty and must be numeric");
        return;
      }
      if (!isNumeric(data.width) || data.width === "") {
        alert("Width can't be empty and must be numeric");
        return;
      }
      if (!isNumeric(data.length) || data.length === "") {
        alert("Length can't be empty and must be numeric");
        return;
      }
    }

    if (data.product_type === "Disk") {
    data["attribute"] = data["size"];
    }
    if (data.product_type === "Book") {
     data["attribute"] = data["weight"];
    }
    if (data.product_type === "Furniture") {
     data["attribute"] = data["height"] + "x" + data["width"] + "x" + data["length"];
    }

   const result = await fetch("save.php", {
    method: "POST",
    body: JSON.stringify(data),
    headers: {
      Accept: "application/json, text/plain, */*",
      "Content-Type": "application/json",
    },
  });

  const response = await result.text();
  if (response === "SKU already exists") {
    alert(response);
  } else {
    window.location.href = "../";
  }
};

const form = document.getElementById("product_form");
form.addEventListener("submit", handleSubmitAdd);
