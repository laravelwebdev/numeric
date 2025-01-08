<template>
    <DefaultField
        :field="currentField"
        :errors="errors"
        :show-help-text="showHelpText"
        :full-width-content="fullWidthContent"
    >
        <template #field>
            <input
                :id="field.attribute"
                type="text"
                class="w-full form-control form-input form-control-bordered"
                :class="errorClasses"
                :placeholder="field.name"
                v-model="displayValue"
                @input="handleInput"
                @blur="handleBlur"
            />
        </template>
    </DefaultField>
</template>

<script>
import { DependentFormField, HandlesValidationErrors } from 'laravel-nova'

export default {
    mixins: [DependentFormField, HandlesValidationErrors],
    props: ["resourceName", "resourceId", "field"],

    data() {
        return {
            displayValue: "",
        };
    },

    methods: {
        setInitialValue() {
            this.value = this.field.value || "";
            this.displayValue = this.formatNumber(this.value);
        },

        fill(formData) {
            // Remove formatting before sending to server
            const rawValue = this.value
                ? this.value.toString().replace(new RegExp(`\\${this.field.separator || "."}`, 'g'), "")
                : "";
            formData.append(this.fieldAttribute, rawValue || "");
        },

        formatNumber(value) {
            if (!value) return "";
            // Remove existing separator first
            const number = value.toString().replace(new RegExp(`\\${this.field.separator || "."}`, 'g'), "");
            // Add separator for thousands
            return number.replace(/\B(?=(\d{3})+(?!\d))/g, this.field.separator || ".");
        },

        handleInput(event) {
            // Remove any non-digit characters except separator
            let input = event.target.value.replace(new RegExp(`[^\\d${this.field.separator || "."}]`, 'g'), "");
            // Remove all separator to get raw number
            let rawNumber = input.replace(new RegExp(`\\${this.field.separator || "."}`, 'g'), "");
            // Update the internal value
            this.value = rawNumber;
            // Format for display
            this.displayValue = this.formatNumber(rawNumber);
        },

        handleBlur() {
            // Reformat on blur to ensure consistent display
            this.displayValue = this.formatNumber(this.value);
        },
    },
};
</script>
