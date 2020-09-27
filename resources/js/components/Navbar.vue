<template>
    <div>
        <b-navbar toggleable="lg" type="dark" variant="info">
            <b-navbar-nav class="ml-auto">
                <b-nav-form>
                    <label>Fecha:</label>
                    <b-form-input id="date" type="date" size="sm" class="mr-sm-2" placeholder="Search"></b-form-input>
                    <label>Nro de Personas:</label>
                    <b-form-input type="number" id="npersons" size="sm" class="mr-sm-2"></b-form-input>
                    <b-button size="sm" class="my-2 my-sm-0" type="submit">Search</b-button>
                </b-nav-form>
            </b-navbar-nav>
        </b-navbar>
    </div>
</template>

