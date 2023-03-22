<template>
    <div class="card">
        <div class="card-body">
            <table class="table table-sm table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Permiso</th>
                        <th class="text-center">Activo</th>
                    </tr>
                </thead>
                <tbody>
                    <role
                        v-for="role of finalRoles"
                        :key="role.id"
                        :role="role"
                    />
                </tbody>
            </table>
        </div>
        <div class="card-footer text-end">
            <a href="/catalogs/users" class="btn btn-secondary">
                <i class="fa-solid fa-chevron-left"></i> Regresar
            </a>
            &nbsp;
            <button class="btn btn-primary" @click="save" :disabled="saving">
                <i class="fa-solid fa-floppy-disk"></i> Guardar
            </button>
        </div>
    </div>
</template>

<script>
export default {
    props: ["user", "roles"],
    data() {
        return {
            saving: false,
            finalRoles: this.roles,
        };
    },
    methods: {
        save() {
            this.saving = true;

            axios
                .post("/catalogs/userroles", {
                    id: this.user.id,
                    roles: this.finalRoles,
                })
                .then((res) => {
                    window.location = "/catalogs/users";
                })
                .catch((error) => {
                    this.saving = false;
                    // this.handleError(error);
                });
        },
    },
};
</script>
