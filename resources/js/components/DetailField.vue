<template>
  <PanelItem :index="index" :field="field">
      <template #value>
      <p v-if="formattedValue">
        {{ formattedValue }}
      </p>
      <p v-else>&mdash;</p>
    </template>
  </PanelItem>
</template>

<script>

export default {

  props: ['index', 'resource', 'resourceName', 'resourceId', 'field'],

  computed: {
    formattedValue() {
        if (!this.field.value) return "";
        const number = this.field.value.toString().replace(new RegExp(`\\${this.field.separator || "."}`, 'g'), "");
        // Add separator for thousands
        return number.replace(/\B(?=(\d{3})+(?!\d))/g, this.field.separator || ".");
    }
  }  
}
</script>
