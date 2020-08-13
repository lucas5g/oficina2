<template>
  <div class="form-group">
    <label class="w-100">
      {{label}}
      <textarea
        :value="value"
        class="form-control form-control-lg"
        required
        @input="$emit('input', $event.target.value)"
      />
    </label>
  </div>
</template>

<script>
export default {
  name: "TextArea",
  props: {
    label: String,
    value: String,
  },
 
  
};
</script>

<style>
/* #input {
  margin-bottom: 1rem;
  background: red;
  width: 100%;
}

#input label {
  width: 100%;
}

#input label input {
  height: calc(1.5em + 1rem + 2px);
  padding: 0.5rem 1rem;
  font-size: 1.125rem;
  line-height: 1.5;
  border-radius: 0.3rem;
  display: block;
  width: 100%;
  height: calc(1.6em + 0.75rem + 2px);
  padding: 0.375rem 0.75rem;
  font-size: 0.9rem;
  font-weight: 400;
  line-height: 1.6;
  color: #495057;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid #ced4da;
  border-radius: 0.25rem;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
} */
</style>