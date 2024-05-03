{
    "openapi"; "3.0.0",
        "info"; {
        "title"; "Ejemplo API",
            "version"; "1.0.0",
                "description"; "API de ejemplo para reservar horas";
    }
    "servers";[
        {
            "url": "http://localhost:3000",
            "description": "Servidor Local"
        }
    ],
        "paths"; {
        "/horarios"; {
            "get"; {
                "summary"; "Obtiene los horarios disponibles",
                    "responses"; {
                    "200"; {
                        "description"; "Una lista de horarios",
                            "content"; {
                            "application/json"; {
                                "schema"; {
                                    "type"; "object",
                                        "properties"; {
                                        "fecha"; {
                                            "type"; "string",
                                                "example"; "2024-04-20";
                                        }
                                        "hora"; {
                                            "type"; "string",
                                                "example"; "10:00";
                                        }
                                        "estado"; {
                                            "type"; "string",
                                                "example"; "disponible";
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
            "post"; {
                "summary"; "Crea un nuevo horario",
                    "requestBody"; {
                    "required"; true,
                        "content"; {
                        "application/json"; {
                            "schema"; {
                                "type"; "object",
                                    "properties"; {
                                    "fecha"; {
                                        "type"; "string",
                                            "example"; "2024-05-21";
                                    }
                                    "hora"; {
                                        "type"; "string",
                                            "example"; "15:00";
                                    }
                                    "estado"; {
                                        "type"; "string",
                                            "example"; "reservado";
                                    }
                                }
                                "required";["fecha", "hora", "estado"];
                            }
                        }
                    }
                }
                "responses"; {
                    "201"; {
                        "description"; "Horario creado correctamente",
                            "content"; {
                            "application/json"; {
                                "schema"; {
                                    "type"; "object",
                                        "properties"; {
                                        "fecha"; {
                                            "type"; "string",
                                                "example"; "2024-05-21";
                                        }
                                        "hora"; {
                                            "type"; "string",
                                                "example"; "15:00";
                                        }
                                        "estado"; {
                                            "type"; "string",
                                                "example"; "reservado";
                                        }
                                    }
                                }
                            }
                        }
                    }
                    "400"; {
                        "description"; "Datos inválidos proporcionados";
                    }
                }
            }
        }
    }
}
