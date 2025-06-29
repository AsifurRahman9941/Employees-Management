$("#jsGrid").jsGrid({
  width: "80%",

  editing: true,
  inserting: false,
  sorting: true,
  paging: true,
  autoload: true,

  pageSize: 10,
  pageButtonCount: 5,
  deleteConfirm: "Do you really want to delete this client?",

  deleteConfirm: "Do you really want to delete the employee?",

  onItemDeleted: () => {
    Toastify({
      text: "The item has been succesfully deleted!",
      position: "center",
      duration: 3000,
      close: true,
      style: {
        background: "linear-gradient(to right, #CB356B, #BD3F32)",
        color: "white",
      },

      offset: {
        x: 50, 
        y: 10, 
      },
    }).showToast();
  },

  onItemInserted: () => {
    Toastify({
      text: "The employee has been successfully added",
      position: "center",
      duration: 3000,
      close: true,
      style: {
        background: "linear-gradient(to right, #1CB5E0, #000046)",
        color: "white",
      },

      offset: {
        x: 50, 
        y: 10, 
      },
    }).showToast();
  },

  onItemUpdated: () => {
    Toastify({
      text: "The employee has been successfully modified",
      position: "center",
      duration: 3000,
      close: true,
      style: {
        background: "linear-gradient(to right, #34e89e, #0f3443)",
        color: "white",
      },

      offset: {
        x: 50, 
        y: 10, 
      },
    }).showToast();
    location.reload();
  },

  controller: {
    loadData: function (response) {
      return $.ajax({
        type: "POST",
        url: window.location.origin + window.location.pathname + "getEmployees",
        data: response,
        dataType: "json",
      });
    },

    insertItem: function (item) {
      return $.ajax({
        type: "POST",
        url: window.location.origin + window.location.pathname + "addEmployee",
        data: item,
      });
    },

    updateItem: function (item) {
      return $.ajax({
        type: "POST",
        url:
          window.location.origin + window.location.pathname + "updateEmployee",
        data: item,
      });
    },

    deleteItem: function (item) {
      return $.ajax({
        type: "POST",
        url:
          window.location.origin + window.location.pathname + "deleteEmployee",
        data: item,
      });
    },
  },

  fields: [
    { name: "id", type: "hidden", visible: false, width: 15 },
    {
      name: "name",
      title: "Name",
      type: "text",
      width: 50,
      align: "center",
      validate: "required",
    },
    {
      name: "email",
      title: "Email",
      type: "text",
      width: 100,
      align: "center",
      validate: "required",
    },
    {
      name: "age",
      title: "Age",
      type: "number",
      width: 30,
      align: "center",
      validate: "required",
    },
    {
      name: "streetAddress",
      title: "Stree No.",
      type: "text",
      width: 50,
      align: "center",
      validate: "required",
    },
    {
      name: "city",
      title: "City",
      type: "text",
      width: 50,
      align: "center",
      validate: "required",
    },
    {
      name: "state",
      title: "State",
      type: "text",
      width: 40,
      align: "center",
      validate: "required",
    },
    {
      name: "postalCode",
      title: "Postal Code",
      type: "number",
      width: 50,
      align: "center",
      validate: "required",
    },
    {
      name: "phoneNumber",
      title: "Phone Number",
      type: "number",
      width: 50,
      align: "center",
      validate: "required",
    },
    { type: "control", editButton: true },
  ],
});
