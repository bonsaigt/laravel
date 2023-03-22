<template>
    <tr>
        <td width="90%">{{ role.name }}</td>
        <td class="text-center">
            <div class="mb-3 form-check">
                <input
                    type="checkbox"
                    class="form-check-input"
                    v-model="role.selected"
                />
            </div>
        </td>
    </tr>
</template>

<script>
export default {
    props: ["role"],
};
</script>
