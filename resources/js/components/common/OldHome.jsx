import { MoveRight } from "lucide-react";

const OldHome = () => {
    return (
        <>
            {/* Hero Section */}
            <section
                className="relative bg-cover bg-center min-h-screen text-white"
                style={{ backgroundImage: "url('./images/hero-bg.jpg')" }}
            >
                {/* Overlay */}
                <div className="absolute inset-0 bg-black bg-opacity-50"></div>
                <div className="container mx-auto px-6 lg:px-10 relative z-10 py-24">
                    <div className="max-w-md space-y-8">
                        <h1 className="text-white block [&>strong]:text-primary [&>strong]:font-semibold font-display [text-wrap:balance] text-5xl font-bold sm:text-6xl">
                            Grow Your <br />{" "}
                            <span className="text-white">Website Traffic</span>
                        </h1>
                        <p className="text-white text-lg sm:text-2xl font-light opacity-90">
                            High-quality, natural, links to help you boost your
                            rankings and generate more traffic to your site.
                        </p>
                        <button className="bg-primary text-white font-medium py-3 px-6 rounded-lg shadow-md hover:bg-primary-dark transition duration-300 flex justify-center items-center gap-2">
                            Get Started <MoveRight />
                        </button>
                    </div>

                    <div className="grid grid-cols-1 md:grid-cols-3 gap-6 mt-36">
                        <div className="bg-primary bg-opacity-90 p-6 rounded-lg shadow-lg">
                            <h3 className="text-sm uppercase font-semibold text-primary-dark">
                                Link Insertions
                            </h3>
                            <h2 className="text-2xl font-bold mt-2">
                                Sit Back & Relax
                            </h2>
                            <p className="mt-3 text-gray-100">
                                Fully custom link building campaigns delivered
                                by GetSEOLinks' experts.
                            </p>
                            <a
                                href="#"
                                className="inline-block mt-4 text-white font-semibold text-sm"
                            >
                                Learn More →
                            </a>
                        </div>

                        <div className="bg-primary bg-opacity-90 p-6 rounded-lg shadow-lg">
                            <h3 className="text-sm uppercase font-semibold text-primary-dark">
                                Guest Posts
                            </h3>
                            <h2 className="text-2xl font-bold mt-2">
                                Advanced Control
                            </h2>
                            <p className="mt-3 text-gray-100">
                                Get access to real websites with powerful
                                metrics in your niche.
                            </p>
                            <a
                                href="#"
                                className="inline-block mt-4 text-white font-semibold text-sm"
                            >
                                Learn More →
                            </a>
                        </div>

                        <div className="bg-primary bg-opacity-90 p-6 rounded-lg shadow-lg">
                            <h3 className="text-sm uppercase font-semibold text-primary-dark">
                                Link Packages
                            </h3>
                            <h2 className="text-2xl font-bold mt-2">
                                Choose Package
                            </h2>
                            <p className="mt-3 text-gray-100">
                                You choose the metrics and our expert team
                                selects the best sites at the best prices.
                            </p>
                            <a
                                href="#"
                                className="inline-block mt-4 text-white font-semibold text-sm"
                            >
                                Learn More →
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        </>
    );
};

export default OldHome;
