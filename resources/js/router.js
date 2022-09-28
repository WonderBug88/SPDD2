import { createRouter, createWebHistory } from "vue-router";
// import store from "@/store";

const LandingIndex = () => import("@/views/landing/Index.vue");
// const UserPass = () => import("@/views/admin/user/EditPassword");

const routes = [
    // {
    //     path: "/",
    //     name: "Admin",
    //     component: LandingIndex,
    //     children: [
    //         {
    //             path: "/dashboard",
    //             name: "Dashboard",
    //             component: Dashboard,
    //         },
    //     ],
    // },
    {
        path: "/laravel-new",
        name: "Landing Page",
        component: LandingIndex,
    },

    {
        path: "/laravel-new/:id",
        name: "Product Page",
        component: LandingIndex,
    },
    /*   {
       name: "404",
       path: "/:catchAll(.*)",
       component: () => import("@/views/404/404.vue"),
     }, */
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach((to, from, next) => {
    // Ubah judul halaman
    document.title = to.name + " | " + appName;
    /*   const token = localStorage.getItem("token");
    if (!token) next("/login");
    if (to.name == "Login" && token) next("/dashboard");
    else  */ next();
});

export default router;
