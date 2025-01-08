<template>
  <div :class="`text-${field.textAlign}`">
    <span>{{ fieldValue }}</span>
  </div>
</template>

<script>
export default {
  props: ['resourceName', 'field'],

  computed: {
    fieldValue() {
      return this.field.displayedAs || this.formatNumber(this.field.value)
    },
  },
  methods: {
    formatNumber(value) {
        if (!value) return "";
        // Remove existing separator first
        const number = value.toString().replace(new RegExp(`\\${this.field.separator || "."}`, 'g'), "");
        // Add separator for thousands
        return number.replace(/\B(?=(\d{3})+(?!\d))/g, this.field.separator || ".");
    },
  }
}
</script>
