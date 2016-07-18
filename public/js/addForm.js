function addInputField(formId) {

  var formGroup = $(formId);
  var childInput = formGroup.children(".form-group:last");
  var childInputCount = formGroup.children().length;
  var inputClone = childInput.clone(true);

  inputClone.find(".input-js").attr('name',
    formGroup.attr('id') + "[" + (childInputCount - 1) + "]");
  inputClone.find(".input-js").val('');

  formGroup.append(inputClone);
}
