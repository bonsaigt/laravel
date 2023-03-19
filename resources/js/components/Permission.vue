<template>
    <tr>
        <td width="90%">{{ permission.title }}</td>
        <td class="text-center">
            <div class="mb-3 form-check">
                <input
                    type="checkbox"
                    class="form-check-input"
                    v-model="permission.selected"
                />
            </div>
        </td>
    </tr>
</template>

<script>
export default {
    props: ["permission", "role"],
    data() {
        return {};
    },
    computed: {},
    methods: {},
};
</script>
