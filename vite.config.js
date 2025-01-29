import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import react from "@vitejs/plugin-react";
import path from "path";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/js/components/counter.jsx",
                "resources/js/components/admin/websites/index.jsx",
                "resources/js/components/admin/websites/WebsiteDetail.jsx",
                "resources/js/components/user/DashboardApp.jsx",
                "resources/js/components/user/RoleToggleSwitch.jsx",
                "resources/js/components/user/PublisherDashboard.jsx",
                "resources/js/components/user/VendorDashboard.jsx",
                "resources/js/components/user/PublisherNewOrders.jsx",
                "resources/js/components/user/PublisherAllOrders.jsx",
                "resources/js/components/common/Home.jsx",
                'resources/js/components/user/WebsitesTable.jsx',
                // 'resources/js/components/ui/**/*.jsx',
            ],
            refresh: true,
        }),
        react(),
    ],
    resolve: {
        alias: {
            "@": path.resolve(__dirname, "resources/js"),
        },
    },
});
